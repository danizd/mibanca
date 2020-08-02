<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movimiento $movimiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Movimiento'), ['action' => 'edit', $movimiento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movimiento'), ['action' => 'delete', $movimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movimiento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Movimientos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movimiento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="movimientos view large-9 medium-8 columns content">
    <h3><?= h($movimiento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Concepto') ?></th>
            <td><?= h($movimiento->concepto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $movimiento->has('categoria') ? $this->Html->link($movimiento->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $movimiento->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($movimiento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Importe') ?></th>
            <td><?= $this->Number->format($movimiento->importe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FechaCtble') ?></th>
            <td><?= h($movimiento->fechaCtble) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ConceptoAmpliado') ?></h4>
        <?= $this->Text->autoParagraph(h($movimiento->conceptoAmpliado)); ?>
    </div>
</div>
