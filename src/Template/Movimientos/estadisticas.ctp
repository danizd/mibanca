<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movimiento[]|\Cake\Collection\CollectionInterface $movimientos
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Lista de Movimientos'), ['controller' => 'Movimientos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de  Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Cadenas de categoría'), ['controller' => 'CadenasCategoria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Movimiento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Importar CSV'), ['controller' => 'Movimientos', 'action' => 'importacsv']) ?></li>
        <li><?= $this->Html->link(__('Importar datos'), ['controller' => 'Movimientos', 'action' => 'import']) ?> </li>
        <li><?= $this->Html->link(__('Estadísticas'), ['controller' => 'Movimientos', 'action' => 'estadisticas']) ?> </li>

    </ul>
</nav>
<div class="movimientos index large-10 medium-9 columns content">
    <h3><?= __('Movimientos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 140px;" scope="col">Categorías</th>
                <th scope="col">Enero</th>
                <th scope="col">Febrero</th>
                <th scope="col">Marzo</th>
                <th scope="col">Abril</th>
                <th scope="col">Mayo</th>
                <th scope="col">Junio</th>
                <th scope="col">Julio</th>
                <th scope="col">Agosto</th>
                <th scope="col">Septiembre</th>
                <th scope="col">Octubre</th>
                <th scope="col">Noviembre</th>
                <th scope="col">Diciembre</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($movs as $key => $movimiento): ?>
              <tr>
                <td><strong><?= $key ?></strong></td>
                  <?php
                  for ($i=1; $i <=12 ; $i++) {
                    if (!isset($movimiento[$i])) {
                    $movimiento[$i] = '';
                    }
                  }
                  ksort($movimiento);
                  foreach ($movimiento as $k => $value): ?>
                  <td><?= $value ?></td>
                <?php endforeach;
                ?>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
