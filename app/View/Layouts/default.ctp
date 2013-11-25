<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo 'Colores Pintuco'; ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php

    // meta
    echo $this->Html->meta('icon');

    // styles
    echo $this->Html->css('cake.generic');
    echo $this->Html->css('superfish');
    echo $this->Html->css('superfish-navbar');
    echo $this->Html->css('superfish-vertical');
    echo $this->Html->css('megafish');

    if (Configure::read('debug')) {
        echo $this->Html->css('jquery-ui-1.10.3.custom');
    } else {
        echo $this->Html->css('jquery-ui-1.10.3.custom.min');
    }

    echo $this->Html->css('styles');

    // scripts

    if (Configure::read('debug')) {
        echo $this->Html->script('jquery-1.10.2');
        //echo $this->Html->script('jquery-migrate-1.2.1');
    } else {
        echo $this->Html->script('jquery-1.10.2.min');
        //echo $this->Html->script('jquery-migrate-1.2.1.min');
    }

    if (Configure::read('debug')) {
        echo $this->Html->script('jquery-ui-1.10.3.custom');
    } else {
        echo $this->Html->script('jquery-ui-1.10.3.custom.min');
    }

    echo $this->Html->script('hoverIntent');

    if (Configure::read('debug')) {
        echo $this->Html->script('superfish');
    } else {
        echo $this->Html->script('superfish.min');
    }

    echo $this->Html->script('supersubs');
    echo $this->Html->script('sitewide');

    if(!isset($this->params['prefix'])) {
        echo $this->Html->script('dymo.label.framework');
        echo $this->Html->script('print-label');
    }

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<div id="container">
    <div id="header"><?php echo $this->element('menu'); ?></div>
    <div id="content" class="<?php echo(isset($this->params['prefix']) ? 'layout-back' : 'layout-front'); ?>">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
    <div id="footer">
        <?php echo $this->Html->image('logo_optsum.jpg', array('class' => 'logo-optsum')); ?>
    </div>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>