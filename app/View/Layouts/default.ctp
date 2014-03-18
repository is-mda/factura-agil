<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
            Factura Agil:
            <?php echo $title_for_layout; ?>
    </title>
    <?php
            echo $this->Html->meta('icon');

            echo $this->Html->css('bootstrap.min');                
            echo $this->Html->css('bootstrap-theme.min');                
            echo $this->Html->css('normalize');                
            echo $this->Html->css('common');                

            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
    ?>
</head>
<body>
    
    <?php echo $this->element('header'); ?>
    
    <div id="content" class="container">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <div class="clearfix"></div>
        <?php echo $this->element('custom_sql_dump'); ?>
    </div>    
    
    <?php echo $this->Html->script(array('jquery'));?>
    <?php echo $this->Html->script(array('bootstrap.min'));?>    
    <?php echo $this->Html->script(array('app/app'));?>
    <?php echo $this->Html->script(array('app/common.manager'));?>
    <?php echo $this->Html->script(array('app/panel.collapse'));?>
    <?php echo $this->fetch('scriptBottom'); ?>
    
</body>
</html>
