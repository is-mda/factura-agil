<h1 class="main-title"><span class="glyphicon glyphicon-plus-sign"></span> Add Company</h1>

<?php echo $this->Form->create('Company', array('role' => 'form')); ?>
	<?php
		echo $this->Form->input('name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('country', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
	?>
<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left') )); ?>

<div class="btn-group form-actions pull-right">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Companies'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>
</div>

