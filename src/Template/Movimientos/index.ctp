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

    <ul class="side-nav">
      <?php if (isset($archivos)) { ?>
        <li class="heading"><?= __('Archivos importados') ?></li>
      <?php
        foreach ($archivos as $archivo): ?>
            <li style="padding-left: 25px;"><?= $archivo ?></li>
        <?php endforeach;
      } ?>
    </ul>


</nav>
<div class="movimientos index large-10 medium-9 columns content">
    <h3><?= __('Movimientos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('concepto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('importe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fechaCtble') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorias_id') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movimientos as $movimiento): ?>
            <tr>
                <td><?= $this->Number->format($movimiento->id) ?></td>
                <td><?= h($movimiento->concepto) ?></td>
                <td><?= $this->Number->format($movimiento->importe) ?></td>
                <td><?= h($movimiento->fechaCtble) ?></td>
                <td><?= $movimiento->has('categoria') ? $this->Html->link($movimiento->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $movimiento->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $movimiento->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $movimiento->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $movimiento->id], ['confirm' => __(' Seguro que deseas borrar  # {0}?', $movimiento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} elemento(s) de un total de {{count}}')]) ?></p>
    </div>
</div>
