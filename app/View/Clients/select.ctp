<h1 class="main-title"><span class="glyphicon glyphicon-plus-sign"></span> <?= __('Add Document') ?> <small><?= __('Select client') ?></small></h1>

<?php echo $this->Form->create('Document', array('role' => 'form')); ?>
<?php
echo $this->Form->input('client_id', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
?>
<?php echo $this->Form->end(array('label' => __('Select'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left'))); ?>
