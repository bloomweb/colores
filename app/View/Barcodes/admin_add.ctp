<div class="barcodes form">
    <?php echo $this->Form->create('Barcode'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Código De Barras'); ?></legend>
        <?php
        echo $this->Form->input('size_id', array('label' => 'Tamaño'));
        echo $this->Form->input('name_id', array('label' => 'Color'));
        echo $this->Form->input('barcode', array('label' => 'Código De Barras'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Enviar')); ?>
</div>