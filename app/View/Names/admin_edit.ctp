<div class="names form">
    <?php echo $this->Form->create('Name'); ?>
    <fieldset>
        <legend><?php echo __('Editar Color'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('code', array('label' => 'Código'));
        echo $this->Form->input('name', array('label' => 'Nombre'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Enviar')); ?>
</div>
