<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CadenasCategorium $cadenasCategorium
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cadenas Categoria'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cadenasCategoria form large-9 medium-8 columns content">
    <?= $this->Form->create($cadenasCategorium) ?>
    <fieldset>
        <legend><?= __('Añadir Cadena de Categoría') ?></legend>
        <?php
            echo $this->Form->control('cadena');
            echo $this->Form->control('categorias_id', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
