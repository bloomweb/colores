<div class="barcodes form">
<?php echo $this->Form->create('Barcode'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Barcode'); ?></legend>
	<?php
		echo $this->Form->input('size_id');
		echo $this->Form->input('name_id');
		echo $this->Form->input('barcode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Barcodes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sizes'), array('controller' => 'sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Size'), array('controller' => 'sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Names'), array('controller' => 'names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Name'), array('controller' => 'names', 'action' => 'add')); ?> </li>
	</ul>
</div>
