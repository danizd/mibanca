<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Listado de Movimientos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('IMPORTAR DATOS'), ['controller' => 'Movimientos', 'action' => 'import']) ?> </li>



    </ul>
</nav>

<div class="categorias view large-9 medium-8 columns content">
<?php if (count($csv) > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo implode('</th><th>', array_keys(current($csv))); ?></th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($csv as $row): array_map('htmlentities', $row); ?>
    <tr>
      <td ><?php echo implode('</td><td>', $row); ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
</div>

