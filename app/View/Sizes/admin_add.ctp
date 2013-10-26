<div class="sizes form">
<?php echo $this->Form->create('Size'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Size'); ?></legend>
	<?php
		echo $this->Form->input('amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sizes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Barcodes'), array('controller' => 'barcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Barcode'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
