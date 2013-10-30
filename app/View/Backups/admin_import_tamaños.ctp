<div class="backups form">
	<?php echo $this->Form->create('Backup', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Importar Tamaños'); ?></legend>
		<?php
			echo $this->Form->input('file', array('label' => 'Archivo CSV', 'type' => 'file'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Subir')); ?>
</div>