<div class="sizes index">
    <h2><?php echo __('Tamaños'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
            <th><?php echo $this->Paginator->sort('amount', 'Tamaño'); ?></th>
            <th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
            <th><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
            <th class="actions"><?php echo __('Acciones'); ?></th>
        </tr>
        <?php foreach ($sizes as $size): ?>
            <tr>
                <td><?php echo h($size['Size']['id']); ?>&nbsp;</td>
                <td><?php echo h($size['Size']['amount']); ?>&nbsp;</td>
                <td><?php echo h($size['Size']['created']); ?>&nbsp;</td>
                <td><?php echo h($size['Size']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $size['Size']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $size['Size']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $size['Size']['id']), null, __('¿Seguro desea eliminar el registro # %s?', $size['Size']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('paginator'); ?>
</div>
