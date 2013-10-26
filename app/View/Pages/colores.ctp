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
                $options = $this->requestAction('/names/getOptions');
                echo $this->Form->input('pintura', array('type' => 'select', 'options' => $options));
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
            </fieldset>
        </div>
        <div class="wrapper right">
            <fieldset>
                <legend>Digite Aquí</legend>
                <?php echo $this->Form->input('tanda_base'); ?>
            </fieldset>
        </div>
    </div>
    <div class="wrapper submit">
        <?php echo $this->Form->submit('Imprimir'); ?>
    </div>
<?php echo $this->Form->end(); ?>