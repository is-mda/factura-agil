<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('bootstrap-theme.min');
        echo $this->Html->css('normalize');
        echo $this->Html->css('document');
        ?>
    </head>
    <body>

        <div id="content" class="container">
            <?php echo $this->fetch('content'); ?>
            <div class="clearfix"></div>
        </div>    

        <?php echo $this->Html->script(array('jquery')); ?>
        <?php echo $this->Html->script(array('app/app')); ?>
        <?php echo $this->fetch('scriptBottom'); ?>        

    </body>
</html>
