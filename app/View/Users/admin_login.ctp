<div class="users form login">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Iniciar Sesión'); ?></legend>
        <?php
        echo $this->Form->input('username', array('label' => 'Nombre de usuario'));
        echo $this->Form->input('password', array('label' => 'Contraseña'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Iniciar Sesión')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
    </ul>
</div>
