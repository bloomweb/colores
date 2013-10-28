<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Modificar Usuario'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('username', array('label' => 'Nombre De Usuario'));
        echo $this->Form->input('old_password', array('label' => 'Contraseña Actual', 'type' => 'password'));
        echo $this->Form->input('new_password', array('label' => 'Nueva Contraseña', 'type' => 'password'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Enviar')); ?>
</div>