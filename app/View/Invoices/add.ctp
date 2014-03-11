
<h1 class="main-title"><span class="glyphicon glyphicon-plus-sign"></span> Add Invoice</h1>

<?php echo $this->Form->create('Invoice', array('role' => 'form')); ?>
	<?php
		echo $this->Form->input('company_id', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('company_name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('company_fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('company_address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('company_country', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('client_id', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('client_name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('client_fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('client_address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('client_country', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('invoice_date', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('gross_amount', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('tax_rate', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('tax_amount', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('net_amount', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
	?>
<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left') )); ?>

<div class="btn-group form-actions pull-right">

		<?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Invoices'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>		<?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Companies'), array('controller' => 'companies', 'action' => 'index'), array('class' => 'btn btn-default btn-sm', 'escape' => false)); ?>
		<?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Company'), array('controller' => 'companies', 'action' => 'add'), array('class' => 'btn btn-default btn-sm', 'escape' => false)); ?>
		<?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Clients'), array('controller' => 'clients', 'action' => 'index'), array('class' => 'btn btn-default btn-sm', 'escape' => false)); ?>
		<?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Client'), array('controller' => 'clients', 'action' => 'add'), array('class' => 'btn btn-default btn-sm', 'escape' => false)); ?>
		<?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Invoice Lines'), array('controller' => 'invoice_lines', 'action' => 'index'), array('class' => 'btn btn-default btn-sm', 'escape' => false)); ?>
		<?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Invoice Line'), array('controller' => 'invoice_lines', 'action' => 'add'), array('class' => 'btn btn-default btn-sm', 'escape' => false)); ?>
</div>

<div class="clearfix"></div>
