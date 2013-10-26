<div class="sizes view">
<h2><?php echo __('Size'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($size['Size']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($size['Size']['amount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Size'), array('action' => 'edit', $size['Size']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Size'), array('action' => 'delete', $size['Size']['id']), null, __('Are you sure you want to delete # %s?', $size['Size']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sizes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Size'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Barcodes'), array('controller' => 'barcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Barcode'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Barcodes'); ?></h3>
	<?php if (!empty($size['Barcode'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Size Id'); ?></th>
		<th><?php echo __('Name Id'); ?></th>
		<th><?php echo __('Barcode'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($size['Barcode'] as $barcode): ?>
		<tr>
			<td><?php echo $barcode['id']; ?></td>
			<td><?php echo $barcode['size_id']; ?></td>
			<td><?php echo $barcode['name_id']; ?></td>
			<td><?php echo $barcode['barcode']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'barcodes', 'action' => 'view', $barcode['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'barcodes', 'action' => 'edit', $barcode['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'barcodes', 'action' => 'delete', $barcode['id']), null, __('Are you sure you want to delete # %s?', $barcode['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Barcode'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
