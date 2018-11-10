<?php namespace Lovata\Toolbox\Classes\Console;

use Lovata\Toolbox\Classes\Parser\MigrationFile;

/**
 * Class CreateMigration
 * @package Lovata\Toolbox\Classes\Console
 * @author  Sergey Zakharevich, s.zakharevich@lovata.com, LOVATA Group
 */
class CreateMigration extends CommonCreateFile
{
    /** @var string The console command name. */
    protected $name = 'toolbox.create.migration.create';
    /** @var string The console command description. */
    protected $description = 'Create a new creation migration.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        parent::handle();

        if (empty($this->arInoutData)) {
            $this->logoToolBox();
            $this->setAuthor();
            $this->setPlugin();
        }

        if (!$this->checkAddition(self::CODE_CONTROLLER)) {
            $this->setController();
        }

        if (!$this->checkAddition(self::CODE_EMPTY_FIELD)) {
            $this->choiceFieldList([
                'preview_image',
                'images',
            ]);
        };

        $this->createFile(MigrationFile::class);
    }
}