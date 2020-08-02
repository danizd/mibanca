<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movimiento $movimiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Movimientos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movimientos form large-9 medium-8 columns content">
    <?= $this->Form->create($movimiento) ?>
    <fieldset>
        <legend><?= __('Add Movimiento') ?></legend>
        <?php
            echo $this->Form->control('concepto');
            echo $this->Form->control('conceptoAmpliado');
            echo $this->Form->control('importe');
            echo $this->Form->control('fechaCtble');
            echo $this->Form->control('categorias_id', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
