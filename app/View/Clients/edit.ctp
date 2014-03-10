
<h1 class="main-title"><span class="glyphicon glyphicon-edit"></span> Edit Client</h1>

<?php echo $this->Form->create('Client', array('role' => 'form')); ?>
	<?php
		echo $this->Form->input('id', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('email', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('country', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('phone', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('fax', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('postal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('bank_account_number', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
	?>
<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left') )); ?>

<div class="form-actions pull-right">
    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ' . __('Delete'), array('action' => 'delete', $this->Form->value('Client.id')), array('class' => 'btn btn-danger btn-sm', 'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Client.id'))); ?>
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Clients'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>
</div>

<div class="clearfix"></div>
