<h1 class="main-title"><span class="glyphicon glyphicon-user"></span> Sign up</h1>

<?php echo $this->Form->create('User', array('role' => 'form')); ?>

   <?php echo $this->Form->input('name', array('class' => 'form-control', 'autofocus', 'div' => array('class' => 'form-group'))); ?>
   <?php echo $this->Form->input('email', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
   <?php echo $this->Form->input('password', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>

<?php echo $this->Form->end(array('label' => __('Register'), 'class' => 'btn btn-default', 'div' => null )); ?>