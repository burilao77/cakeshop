<?php

use Phinx\Migration\AbstractMigration;

class CreateProductsShoppingsTable extends AbstractMigration
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
        $table = $this->table('products_shoppings');
        $table->addColumn('product_id', 'integer', array('signed' => 'disable'))
              ->addForeignKey('product_id', 'products', 'id', array('delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'))
              ->addColumn('shopping_id', 'integer', array('signed' => 'disable'))
              ->addForeignKey('shopping_id', 'shoppings', 'id', array('delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'))
              ->create();
    }
}
