<?php 
// JS engine
$this->Html->script('app/invoice.manager', array('block' => 'scriptBottom'));
$this->Html->script('app/invoice.model', array('block' => 'scriptBottom'));
?>
<?php echo $this->Form->create('Invoice', array('role' => 'form', 'id' => 'invoice')); ?>

<?= $this->Form->hidden('id'); ?>

<?= $this->element('Documents/document_form') ?>

<div class="row">
    <div class="col-md-2">
        <?php
        echo $this->Form->input('gross_amount', array('class' => 'form-control currency', 'data-field' => 'Invoice.gross_amount', 'readonly', 'type' => 'text', 'div' => array('class' => 'form-group')));
        ?>
    </div>
    <div class="col-md-1">
        <?php
        echo $this->Form->input('tax_rate', array('class' => 'form-control rate', 'data-field' => 'Invoice.tax_rate', 'readonly', 'div' => array('class' => 'form-group')));
        ?>    
    </div>
    <div class="col-md-2">
        <?php
        echo $this->Form->input('tax_amount', array('class' => 'form-control currency', 'data-field' => 'Invoice.tax_amount', 'readonly', 'type' => 'text', 'div' => array('class' => 'form-group')));
        ?>
    </div>
    <div class="col-md-2">
        <?php
        echo $this->Form->input('net_amount', array('class' => 'form-control currency', 'data-field' => 'Invoice.net_amount', 'readonly', 'type' => 'text', 'div' => array('class' => 'form-group')));
        ?>    
    </div>    
</div>

<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left'))); ?>
