<?php


use Phinx\Migration\AbstractMigration;

class InitialMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('documents');
        $table->addColumn('name', 'string')
            ->addColumn('created_at', 'integer', ['default' => 0])
            ->addColumn('updated_at', 'integer', ['default' => 0])
            ->addColumn('exported_at', 'integer', ['default' => 0])
            ->addColumn('owner_key', 'string', ['default' => ''])
            ->save();

        $table = $this->table('document_rows');
        $table->addColumn('document_id', 'integer')
            ->addColumn('key', 'string')
            ->addColumn('value', 'string', ['default' => ''])
            ->addColumn('created_at', 'integer', ['default' => 0])
            ->addColumn('updated_at', 'integer', ['default' => 0])
            ->save();

    }
}
