<div class="names view">
    <h2><?php echo __('Color'); ?></h2>
    <dl>
        <dt><?php echo __('ID'); ?></dt>
        <dd>
            <?php echo h($name['Name']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Código'); ?></dt>
        <dd>
            <?php echo h($name['Name']['code']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nombre'); ?></dt>
        <dd>
            <?php echo h($name['Name']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Creado'); ?></dt>
        <dd>
            <?php echo h($name['Name']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado'); ?></dt>
        <dd>
            <?php echo h($name['Name']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="related">
    <h3><?php echo __('Codigos De Barra Relacionados'); ?></h3>
    <?php if (!empty($name['Barcode'])): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?php echo __('ID'); ?></th>
                <th><?php echo __('Barcode'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($name['Barcode'] as $barcode): ?>
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
