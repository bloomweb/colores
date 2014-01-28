<?php
echo $this->Form->create(
    'Label',
    array(
        'id' => 'label-form',
        'action' => '/printLabel'
    )
);
?>
    <div class="wrapper height2">
        <div class="wrapper left">
            <?php echo $this->Html->image('colores_pintuco.jpg', array('class' => 'logo')); ?>
        </div>
        <div class="wrapper right">
            <fieldset>
                <legend>Vista Previa</legend>
                <div class="preview"></div>
                <img id="label-preview-image" src="" alt=""/>
            </fieldset>
        </div>
    </div>
    <div class="wrapper inputs height1">
        <div class="wrapper left">
            <fieldset>
                <legend>Color</legend>
                <?php
                echo $this->Form->input('name', array('type' => 'text', 'label' => 'Pintura', 'placeholder' => 'Ingrese el nombre del color que busca'));
                echo $this->Form->input('pintura', array('type' => 'hidden'));
                ?>
            </fieldset>
        </div>
        <div class="wrapper mid">
            <fieldset>
                <legend>Tamaño</legend>
                <?php
                $options = $this->requestAction('/sizes/getOptions');
                echo $this->Form->input('tamaño', array('type' => 'select', 'options' => $options));
                ?>
            </fieldset>
        </div>
        <div class="wrapper right">
            <fieldset>
                <legend>Digite Aquí</legend>
                <?php echo $this->Form->input('tanda_base'); ?>
                <div class="actions">
                    <a class="update-preview">Actualizar</a>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="wrapper printers">
        <?php echo $this->Form->input('impresora', array('label' => 'Seleccione una impresora', 'type' => 'select', 'empty' => '- Ninguna -')); ?>
    </div>
    <div class="wrapper submit">
        <div class="filler-div"></div>
        <div class="button-submit-div">
            <?php echo $this->Form->submit('Imprimir'); ?>
        </div>
        <div class="logo-div">
            <a href="http://www.optsum.com" target="_blank"><?php echo $this->Html->image('logo_optsum.jpg', array('class' => 'logo-optsum')); ?></a>
            <p class="logo-text">Diseñado y desarrollado por OPTSUM INGENIERIA S.A.S</p>
            <p class="logo-text">Copyright 2014. All rights reserved</p>
            <p class="logo-text"><a href="http://www.optsum.com" target="_blank">www.optsum.com</a></p>
    </div>
<?php echo $this->Form->end(); ?>