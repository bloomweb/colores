<div class="logs index">
    <h2><?php echo __('Registros'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
            <th><?php echo $this->Paginator->sort('color', 'Color'); ?></th>
            <th><?php echo $this->Paginator->sort('tamaño', 'Tamaño'); ?></th>
            <th><?php echo $this->Paginator->sort('barcode_id', 'Código De Barras'); ?></th>
            <th><?php echo $this->Paginator->sort('tanda_base', 'Tanda Base'); ?></th>
            <th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
            <th class="actions"><?php echo __('Acciones'); ?></th>
        </tr>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?php echo h($log['Log']['id']); ?>&nbsp;</td>
                <td><?php echo h($log['Log']['color']); ?>&nbsp;</td>
                <td><?php echo h($log['Log']['tamaño']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($log['Barcode']['barcode'], array('controller' => 'barcodes', 'action' => 'view', $log['Barcode']['id'])); ?>
                </td>
                <td><?php echo h($log['Log']['tanda_base']); ?>&nbsp;</td>
                <td><?php echo h($log['Log']['created']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $log['Log']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('paginator'); ?>
</div>