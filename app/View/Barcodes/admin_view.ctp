<div class="barcodes view">
    <h2><?php echo __('Código De Barras'); ?></h2>
    <dl>
        <dt><?php echo __('ID'); ?></dt>
        <dd>
            <?php echo h($barcode['Barcode']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tamaño'); ?></dt>
        <dd>
            <?php echo $this->Html->link($barcode['Size']['amount'], array('controller' => 'sizes', 'action' => 'view', $barcode['Size']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Color'); ?></dt>
        <dd>
            <?php echo $this->Html->link($barcode['Name']['name'], array('controller' => 'names', 'action' => 'view', $barcode['Name']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Código De Barras'); ?></dt>
        <dd>
            <?php echo h($barcode['Barcode']['barcode']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Creado'); ?></dt>
        <dd>
            <?php echo h($barcode['Barcode']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado'); ?></dt>
        <dd>
            <?php echo h($barcode['Barcode']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>