<div class="names index">
    <h2><?php echo __('Colores'); ?></h2>
    <table class="filtros barcodes">
        <tr>
            <?php echo $this->Form->create('Name', array('action' => 'index/1')); ?>
            <td class="title">Filtro</td>
            <td class="label">Código</td><td class="input"><?php echo $this->Form->input('code', array('div' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'Contenido del código', 'required' => false, 'maxlength' => 12)); ?></td>
            <td class="label">Color</td><td class="input"><?php echo $this->Form->input('name', array('div' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'Contenido del color', 'required' => false, 'maxlength' => 12)); ?></td>
            <td class="submit filter"><?php echo $this->Form->submit('Filtrar', array('div' => false)); ?></td>
            <?php echo $this->Form->end(); ?>
            <?php if($this->Session->read('Filtros.name.active')): ?>
                <?php echo $this->Form->create('Name', array('action' => 'index')); ?>
                <td class="submit reset"><?php echo $this->Form->submit('Quitar Filtros', array('div' => false)); ?></td>
                <?php echo $this->Form->end(); ?>
            <?php endif; ?>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
            <th><?php echo $this->Paginator->sort('code', 'Código'); ?></th>
            <th><?php echo $this->Paginator->sort('name', 'Color'); ?></th>
            <th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
            <th><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
            <th class="actions"><?php echo __('Acciones'); ?></th>
        </tr>
        <?php foreach ($names as $name): ?>
            <tr>
                <td><?php echo h($name['Name']['id']); ?>&nbsp;</td>
                <td><?php echo h($name['Name']['code']); ?>&nbsp;</td>
                <td><?php echo h($name['Name']['name']); ?>&nbsp;</td>
                <td><?php echo h($name['Name']['created']); ?>&nbsp;</td>
                <td><?php echo h($name['Name']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $name['Name']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $name['Name']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $name['Name']['id']), null, __('¿Seguro desea eliminar el registro # %s?', $name['Name']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('paginator'); ?>
</div>