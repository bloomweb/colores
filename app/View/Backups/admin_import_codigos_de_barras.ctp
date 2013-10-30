<div class="backups form">
	<?php echo $this->Form->create('Backup', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Importar Códigos De Barras'); ?></legend>
		<h4>Recuerde que para importar estos datos la información relacionada debe de existir en <b>colores</b> y <b>tamaños</b>.</h4>
		<h4><i>Este proceso <b>puede tardar varios minutos</b> dependiendo de la cantidad de registros que se esten ingresando al sistema.</i></i></h4>
		<?php
			echo $this->Form->input('file', array('label' => 'Archivo CSV', 'type' => 'file'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Subir')); ?>
</div>