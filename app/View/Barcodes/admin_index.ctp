<div class="barcodes index">
    <h2><?php echo __('Códigos De Barras'); ?></h2>

    <table class="filtros barcodes">
        <tr>
            <?php echo $this->Form->create('Barcode', array('action' => 'index/1')); ?>
            <td class="title">Filtro</td>
            <td class="label">Color</td><td class="input"><?php echo $this->Form->input('name_id', array('div' => false, 'label' => false, 'empty' => '- Seleccione -', 'required' => false)); ?></td>
            <td class="label">Tamaño</td><td class="input"><?php echo $this->Form->input('size_id', array('div' => false, 'label' => false, 'empty' => '- Seleccione -', 'required' => false)); ?></td>
            <td class="label">Código</td><td class="input"><?php echo $this->Form->input('barcode', array('div' => false, 'label' => false, 'type' => 'text', 'placeholder' => 'Contenido del código', 'required' => false, 'maxlength' => 12)); ?></td>
            <td class="submit filter"><?php echo $this->Form->submit('Filtrar', array('div' => false)); ?></td>
            <?php echo $this->Form->end(); ?>
            <?php if($this->Session->read('Filtros.barcode.active')): ?>
                <?php echo $this->Form->create('Barcode', array('action' => 'index')); ?>
                <td class="submit reset"><?php echo $this->Form->submit('Quitar Filtros', array('div' => false)); ?></td>
                <?php echo $this->Form->end(); ?>
            <?php endif; ?>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
            <th><?php echo $this->Paginator->sort('size_id', 'Tamaño'); ?></th>
            <th><?php echo $this->Paginator->sort('name_id', 'Color'); ?></th>
            <th><?php echo $this->Paginator->sort('barcode', 'Código'); ?></th>
            <th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
            <th><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
            <th class="actions"><?php echo __('Acciones'); ?></th>
        </tr>
        <?php foreach ($barcodes as $barcode): ?>
            <tr>
                <td><?php echo h($barcode['Barcode']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($barcode['Size']['amount'], array('controller' => 'sizes', 'action' => 'view', $barcode['Size']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($barcode['Name']['name'], array('controller' => 'names', 'action' => 'view', $barcode['Name']['id'])); ?>
                </td>
                <td><?php echo h($barcode['Barcode']['barcode']); ?>&nbsp;</td>
                <td><?php echo h($barcode['Barcode']['created']); ?>&nbsp;</td>
                <td><?php echo h($barcode['Barcode']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $barcode['Barcode']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $barcode['Barcode']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $barcode['Barcode']['id']), null, __('¿Seguro desea eliminar el registro # %s?', $barcode['Barcode']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('paginator'); ?>
</div>