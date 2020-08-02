<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CadenasCategorium $cadenasCategorium
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cadenas Categorium'), ['action' => 'edit', $cadenasCategorium->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cadenas Categorium'), ['action' => 'delete', $cadenasCategorium->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cadenasCategorium->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cadenas Categoria'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cadenas Categorium'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cadenasCategoria view large-9 medium-8 columns content">
    <h3><?= h($cadenasCategorium->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cadena') ?></th>
            <td><?= h($cadenasCategorium->cadena) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $cadenasCategorium->has('categoria') ? $this->Html->link($cadenasCategorium->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $cadenasCategorium->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cadenasCategorium->id) ?></td>
        </tr>
    </table>
</div>
