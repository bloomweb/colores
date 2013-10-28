<div class="logs view">
<h2><?php echo __('Registro'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($log['Log']['id']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Color'); ?></dt>
        <dd>
            <?php echo h($log['Log']['color']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tamaño'); ?></dt>
        <dd>
            <?php echo h($log['Log']['tamaño']); ?>
            &nbsp;
        </dd>
		<dt><?php echo __('Código De Barras'); ?></dt>
		<dd>
			<?php echo $this->Html->link($log['Barcode']['barcode'], array('controller' => 'barcodes', 'action' => 'view', $log['Barcode']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tanda Base'); ?></dt>
		<dd>
			<?php echo h($log['Log']['tanda_base']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($log['Log']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Log'), array('action' => 'edit', $log['Log']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Log'), array('action' => 'delete', $log['Log']['id']), null, __('Are you sure you want to delete # %s?', $log['Log']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Barcodes'), array('controller' => 'barcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Barcode'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
