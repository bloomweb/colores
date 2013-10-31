<div class="backups form csv">
	<?php echo $this->Form->create('Backup', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Importar Tamaños'); ?></legend>
		<?php
			echo $this->Form->input('file', array('label' => 'Archivo CSV', 'type' => 'file'));
			echo $this->Form->input('separador', array('Separador', 'type' => 'text', 'maxlength' => 1, 'required' => 'required', 'value' => ','));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Subir')); ?>
</div>