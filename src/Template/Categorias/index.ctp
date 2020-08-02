<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria[]|\Cake\Collection\CollectionInterface $categorias
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Lista de Movimientos'), ['controller' => 'Movimientos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de  Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Cadenas de categoría'), ['controller' => 'CadenasCategoria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Importar CSV'), ['controller' => 'Movimientos', 'action' => 'importacsv']) ?></li>
        <li><?= $this->Html->link(__('Nueva Categoria'), ['action' => 'add']) ?></li>

    </ul>
</nav>
<div class="categorias index large-10 medium-9 columns content">
    <h3><?= __('Categorias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $this->Number->format($categoria->id) ?></td>
                <td><?= h($categoria->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $categoria->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $categoria->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $categoria->id], ['confirm' => __('Seguro que deseas borrar # {0}?', $categoria->id)]) ?>
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
