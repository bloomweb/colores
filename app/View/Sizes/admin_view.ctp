<div class="sizes view">
    <h2><?php echo __('Tamaño'); ?></h2>
    <dl>
        <dt><?php echo __('ID'); ?></dt>
        <dd>
            <?php echo h($size['Size']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tamaño'); ?></dt>
        <dd>
            <?php echo h($size['Size']['amount']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Creado'); ?></dt>
        <dd>
            <?php echo h($size['Size']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado'); ?></dt>
        <dd>
            <?php echo h($size['Size']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="related">
    <h3><?php echo __('Related Barcodes'); ?></h3>
    <?php if (!empty($size['Barcode'])): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?php echo __('ID'); ?></th>
                <th><?php echo __('Código De Barras'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($size['Barcode'] as $barcode): ?>
                <tr>
                    <td><?php echo $barcode['id']; ?></td>
                    <td><?php echo $barcode['barcode']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Ver'), array('controller' => 'barcodes', 'action' => 'view', $barcode['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>