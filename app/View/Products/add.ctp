
<h1 class="main-title"><span class="glyphicon glyphicon-plus-sign"></span> Add Product</h1>

<?php echo $this->Form->create('Product', array('role' => 'form')); ?>
	<?php
		echo $this->Form->input('ean', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('description', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
		echo $this->Form->input('price', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
	?>
<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left') )); ?>

<div class="btn-group form-actions pull-right">

		<?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Products'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?></div>

<div class="clearfix"></div>
