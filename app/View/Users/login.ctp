<h1 class="main-title"><span class="glyphicon glyphicon-log-in"></span> Sign in</h1>

<?php echo $this->Session->flash('auth'); ?>

<?php echo $this->Form->create('User', array('role' => 'form')); ?>

   <?php echo $this->Form->input('email', array('class' => 'form-control', 'autofocus', 'div' => array('class' => 'form-group'))); ?>
   <?php echo $this->Form->input('password', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>

<?php echo $this->Form->end(array('label' => __('Submit'), 'class' => 'btn btn-default', 'div' => null )); ?>