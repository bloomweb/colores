<div class="sizes form">
<?php echo $this->Form->create('Size'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Size'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Size.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Size.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sizes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Barcodes'), array('controller' => 'barcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Barcode'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
