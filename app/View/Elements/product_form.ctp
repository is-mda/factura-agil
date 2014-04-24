<?php echo $this->Form->create('Product', array('role' => 'form')); ?>
<?php
if ($this->request->data('Product.id'))
    echo $this->Form->input('id', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('description', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('price', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
?>
<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left'))); ?>