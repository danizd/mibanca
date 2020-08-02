<?php
use Migrations\AbstractMigration;

class CreateCadenascategoriaTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
      $table = $this->table('cadenas_categoria');
      $table ->addColumn('cadena', 'string', ['limit' => 255])
             ->create();

      $reftable = $this->table('cadenas_categoria');
      $reftable->addColumn('categorias_id', 'integer', array('signed' => 'disable'))
               ->addForeignKey('categorias_id', 'categorias', 'id', array('delete' => 'CASCADE', 'update' => 'NO_ACTION'))
               ->update();


    }
}
