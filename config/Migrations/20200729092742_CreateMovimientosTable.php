<?php
use Migrations\AbstractMigration;

class CreateMovimientosTable extends AbstractMigration
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
      $table = $this->table('movimientos');
      $table ->addColumn('concepto', 'string', ['limit' => 255])
             ->addColumn('conceptoAmpliado', 'text')
             ->addColumn('importe', 'decimal', ['precision' => 10, 'scale' => 2])
             ->addColumn('fechaCtble', 'date')
             ->addColumn('archivo', 'string', ['limit' => 255])
             ->create();

      $reftable = $this->table('movimientos');
      $reftable->addColumn('categorias_id', 'integer', array('signed' => 'disable'))
               ->addForeignKey('categorias_id', 'categorias', 'id', array('delete' => 'CASCADE', 'update' => 'NO_ACTION'))
               ->update();


    }
}
