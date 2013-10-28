<div class="sizes form">
    <?php echo $this->Form->create('Size'); ?>
    <fieldset>
        <legend><?php echo __('Editar Tamaño'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('amount', array('label' => 'Tamaño'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Enviar')); ?>
</div>