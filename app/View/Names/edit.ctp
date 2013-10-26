<div class="names form">
<?php echo $this->Form->create('Name'); ?>
	<fieldset>
		<legend><?php echo __('Edit Name'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Name.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Name.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Names'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Barcodes'), array('controller' => 'barcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Barcode'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
