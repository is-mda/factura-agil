<?php 
// JS engine
$this->Html->script('app/barcode.manager', array('block' => 'scriptBottom'));
$this->Html->scriptBlock("var Data = {products: {$products}};", array('block' => 'scriptBottom'));
$this->Html->script('app/products.manager', array('block' => 'scriptBottom'));
$this->Html->script('app/document_item.model', array('block' => 'scriptBottom'));
$this->Html->script('app/document_items.manager', array('block' => 'scriptBottom'));
$companyName = $this->request->data('Document.company_name');
$clientName = $this->request->data('Document.client_name');
?>

<div class="form-inline pull-left invoice-code">
    <?php
    echo $this->Form->hidden('Document.id');
    echo $this->Form->input('Document.code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
    ?>   
</div>

<div class="form-inline pull-right invoice-date">
    <?php
    echo $this->Form->input('Document.document_date', array('class' => 'form-control', 'separator' => null, 'div' => array('class' => 'form-group')));
    ?>   
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary panel-collapse">
            <div class="panel-heading"><?= __('Company') ?><?php if(!empty($companyName)) echo ': ' . $this->Html->tag('strong', $companyName); ?><span class="glyphicon glyphicon-chevron-down pull-right"></span></div>
            <div class="panel-body">
                <?php
                echo $this->Form->hidden('Document.company_id');
                echo $this->Form->input('Document.company_name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Document.company_fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Document.company_address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Document.company_country', array('options' => $this->Country->get(), 'empty' => true, 'class' => 'form-control', 'div' => array('class' => 'form-group')));
                ?>
            </div>
        </div>        
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary panel-collapse">
            <div class="panel-heading"><?= __('Client') ?><?php if(!empty($clientName)) echo ': ' . $this->Html->tag('strong', $clientName); ?><span class="glyphicon glyphicon-chevron-down pull-right"></span></div>
            <div class="panel-body">
                <?php
                echo $this->Form->hidden('Document.client_id');
                echo $this->Form->input('Document.client_name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Document.client_fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Document.client_address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Document.client_country', array('options' => $this->Country->get(), 'empty' => true, 'class' => 'form-control', 'div' => array('class' => 'form-group')));
                ?>
            </div>
        </div>        
    </div>
</div>

<?= $this->element('Documents/document_items_form') ?>

<div class="pull-right add-line-action">
    <button class="btn btn-danger btn-sm disabled remove-lines"><span class="glyphicon glyphicon-remove-circle"></span> <?= __('Remove lines') ?></button>
    <button class="btn btn-primary btn-sm add-line"><span class="glyphicon glyphicon-plus-sign"></span> <?= __('Add line') ?></button>    
</div>

