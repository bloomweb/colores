<div class="barcodes index">
    <h2><?php echo __('Códigos De Barras'); ?></h2>
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