<?php 
// JS engine
$this->Html->script('app/order.manager', array('block' => 'scriptBottom'));
$this->Html->script('app/order.model', array('block' => 'scriptBottom'));
?>
<?php echo $this->Form->create('Order', array('role' => 'form', 'id' => 'invoice')); ?>

<?= $this->Form->hidden('id'); ?>

<?= $this->element('Documents/document_form', array('panelType' => 'primary')) ?>

<div class="row">
    <div class="col-md-2">
        <?php
        echo $this->Form->input('gross_amount', array('class' => 'form-control currency', 'data-field' => 'Order.gross_amount', 'readonly', 'type' => 'text', 'div' => array('class' => 'form-group')));
        ?>
    </div>
</div>

<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left'))); ?>
