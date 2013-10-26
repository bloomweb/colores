<?php if ($result) { ?>
    <fieldset class="barcode">
        <legend>Código De Barras</legend>
        <input type="text" value="<?php echo $barcode['Barcode']['barcode']; ?>" disabled>
    </fieldset>
    <fieldset class="namecode">
        <legend>Código</legend>
        <input type="text" value="<?php echo $barcode['Name']['code']; ?>" disabled>
    </fieldset>
<?php } else { ?>
    <?php echo $this->Session->flash(); ?>
<?php } ?>