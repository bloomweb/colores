<?php
echo $this->Form->create(
    'Label',
    array(
        'id' => 'label-form',
        'action' => '/printLabel'
    )
);
?>
    <div class="wrapper image">
        <?php echo $this->Html->image('colores_pintuco.jpg'); ?>
    </div>
    <div class="wrapper height1">
        <div class="wrapper left">
            <fieldset>
                <legend>Color</legend>
                <?php
                //$options = $this->requestAction('/names/getOptions');
                //echo $this->Form->input('pintura', array('type' => 'select', 'options' => $options));
                echo $this->Form->input('name', array('type' => 'text', 'label' => 'Pintura', 'placeholder' => 'Ingrese el nombre del color que busca'));
                echo $this->Form->input('pintura', array('type' => 'hidden'));
                ?>
            </fieldset>
        </div>
        <div class="wrapper right">
            <fieldset>
                <legend>Tamaño</legend>
                <?php
                $options = $this->requestAction('/sizes/getOptions');
                echo $this->Form->input('tamaño', array('type' => 'select', 'options' => $options));
                ?>
            </fieldset>
        </div>
    </div>
    <div class="wrapper height2">
        <div class="wrapper left">
            <fieldset>
                <legend>Vista Previa</legend>
                <div class="preview"></div>
                <img id="label-preview-image" src="" alt=""/>
            </fieldset>
        </div>
        <div class="wrapper right">
            <fieldset>
                <legend>Digite Aquí</legend>
                <?php echo $this->Form->input('tanda_base'); ?>
                <div class="actions" style="display: block; margin: 30px auto; width: 180px;">
                    <a class="update-preview">Actualizar Vista Previa</a>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="wrapper printers">
        <?php echo $this->Form->input('impresora', array('label' => 'Seleccione una impresora', 'type' => 'select', 'empty' => '- Ninguna -')); ?>
    </div>
    <div class="wrapper submit">
        <?php echo $this->Form->submit('Imprimir'); ?>
    </div>
<?php echo $this->Form->end(); ?>