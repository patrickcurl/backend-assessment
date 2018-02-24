<?php

use Phinx\Migration\AbstractMigration;

class CreateAddressesTable extends AbstractMigration
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
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('addresses', ['engine' => getenv('DB_ENGINE')]);
        $table->addColumn('name', 'string', ['limit' => 200])
              ->addColumn('address_1', 'string', ['limit' => 200])
              ->addColumn('address_2', 'string', ['limit' => 200, 'null' => true])
              ->addColumn('city', 'string', ['limit' => 100])
              ->addColumn('state', 'string', ['limit' => 100])
              ->addColumn('zipcode', 'string', ['limit' => 100])
              ->addTimestamps()
              ->addIndex(['zipcode'], ['type' => 'fulltext'])
              ->addIndex(['name'], ['unique' => true, 'type' => 'fulltext'])
              ->create();
    }
}
