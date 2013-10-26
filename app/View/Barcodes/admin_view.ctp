<div class="barcodes view">
<h2><?php echo __('Barcode'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($barcode['Barcode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo $this->Html->link($barcode['Size']['amount'], array('controller' => 'sizes', 'action' => 'view', $barcode['Size']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo $this->Html->link($barcode['Name']['name'], array('controller' => 'names', 'action' => 'view', $barcode['Name']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Barcode'); ?></dt>
		<dd>
			<?php echo h($barcode['Barcode']['barcode']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Barcode'), array('action' => 'edit', $barcode['Barcode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Barcode'), array('action' => 'delete', $barcode['Barcode']['id']), null, __('Are you sure you want to delete # %s?', $barcode['Barcode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Barcodes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Barcode'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sizes'), array('controller' => 'sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Size'), array('controller' => 'sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Names'), array('controller' => 'names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Name'), array('controller' => 'names', 'action' => 'add')); ?> </li>
	</ul>
</div>
