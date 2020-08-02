<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Lista de Movimientos'), ['controller' => 'Movimientos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de  Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Cadenas de categoría'), ['controller' => 'CadenasCategoria', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="movimientos index large-10 medium-9 columns content">
<div class="content">
    <?= $this->Flash->render() ?>
    <div class="upload-frm">
        <?php echo $this->Form->create($uploadData, ['type' => 'file']); ?>
            <?php echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']); ?>
            <?php echo $this->Form->button(__('Sube CSV'), ['type'=>'submit', 'class' => 'form-controlbtn btn-default']); ?>
            <?php   echo $this->Form->error('csv');?>

        <?php echo $this->Form->end(); ?>
    </div>
</div>


</div>
