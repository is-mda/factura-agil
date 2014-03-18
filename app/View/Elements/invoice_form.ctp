<?php 
// JS engine
$this->Html->script('app/invoice.manager', array('block' => 'scriptBottom'));
$this->Html->script('app/invoice.model', array('block' => 'scriptBottom'));
$this->Html->script('app/invoice_lines.manager', array('block' => 'scriptBottom'));
$this->Html->script('app/invoice_line.model', array('block' => 'scriptBottom'));
$id = $this->request->data('Invoice.id');
$companyName = $this->request->data('Invoice.company_name');
$clientName = $this->request->data('Invoice.client_name');
?>
<?php echo $this->Form->create('Invoice', array('role' => 'form', 'id' => 'invoice')); ?>

<div class="form-inline pull-left invoice-code">
    <?php
    if(!empty($id)) echo $this->Form->hidden('id');
    echo $this->Form->input('code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
    ?>   
</div>

<div class="form-inline pull-right invoice-date">
    <?php
    echo $this->Form->input('invoice_date', array('class' => 'form-control', 'separator' => null, 'div' => array('class' => 'form-group')));
    ?>   
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary panel-collapse">
            <div class="panel-heading"><?= __('Company') ?><?php if(!empty($companyName)) echo ': ' . $this->Html->tag('strong', $companyName); ?><span class="glyphicon glyphicon-chevron-down pull-right"></span></div>
            <div class="panel-body">
                <?php
                echo $this->Form->hidden('company_id');
                echo $this->Form->input('company_name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('company_fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('company_address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('company_country', array('options' => $this->Country->get(), 'empty' => true, 'class' => 'form-control', 'div' => array('class' => 'form-group')));
                ?>
            </div>
        </div>        
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary panel-collapse">
            <div class="panel-heading"><?= __('Client') ?><?php if(!empty($clientName)) echo ': ' . $this->Html->tag('strong', $clientName); ?><span class="glyphicon glyphicon-chevron-down pull-right"></span></div>
            <div class="panel-body">
                <?php
                echo $this->Form->hidden('client_id');
                echo $this->Form->input('client_name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('client_fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('client_address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('client_country', array('options' => $this->Country->get(), 'empty' => true, 'class' => 'form-control', 'div' => array('class' => 'form-group')));
                ?>
            </div>
        </div>        
    </div>
</div>

<?= $this->element('invoice_lines_form') ?>

<div class="pull-right add-line-action">
    <button class="btn btn-danger btn-sm disabled remove-lines"><span class="glyphicon glyphicon-remove-circle"></span> <?= __('Remove lines') ?></button>
    <button class="btn btn-primary btn-sm add-line"><span class="glyphicon glyphicon-plus-sign"></span> <?= __('Add line') ?></button>    
</div>

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
