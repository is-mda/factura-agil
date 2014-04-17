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
        echo $this->Html->css('invoice');
        ?>
    </head>
    <body>

        <div id="content" class="container">
            <?php echo $this->fetch('content'); ?>
            <div class="clearfix"></div>
        </div>    

    </body>
</html>
