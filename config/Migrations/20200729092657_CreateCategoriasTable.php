<?php
use Migrations\AbstractMigration;

class CreateCategoriasTable extends AbstractMigration
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
      $table = $this->table('categorias');
      $table ->addColumn('nombre', 'string', ['limit' => 255])
             ->create();

    }
}
