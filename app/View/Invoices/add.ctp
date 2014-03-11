<h1 class="main-title"><span class="glyphicon glyphicon-plus-sign"></span> Add Invoice</h1>

<?php echo $this->Form->create('Invoice', array('role' => 'form')); ?>

<div class="form-inline pull-left invoice-code">
    <?php
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
        <div class="panel panel-primary">
            <div class="panel-heading"><?= __('Company') ?></div>
            <div class="panel-body">
                <?php
                echo $this->Form->input('company_name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('company_fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('company_address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('company_country', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                ?>
            </div>
        </div>        
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading"><?= __('Client') ?></div>
            <div class="panel-body">
                <?php
                echo $this->Form->input('client_name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('client_fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('client_address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('client_country', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                ?>
            </div>
        </div>        
    </div>
</div>

<div class="pull-right add-line-action">
    <button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> <?= __('Add line') ?></button>
</div>

<div class="clearfix"></div>

<div class="panel panel-primary">
    <div class="panel-heading"><?= __('Invoice lines') ?></div>
    <table class="table table-striped table-hover">
        <tr>
            <th><?php echo __('Item name'); ?></th>
            <th><?php echo __('Price'); ?></th>
            <th><?php echo __('Quantity'); ?></th>
            <th><?php echo __('Amount'); ?></th>
        </tr>
        <tr>
            <td class="col-md-5"><?= $this->Form->input('InvoiceLine.0.item_name', array('class' => 'form-control', 'div' => null, 'label' => false)) ?></td>
            <td><?= $this->Form->input('InvoiceLine.0.item_price', array('class' => 'form-control', 'div' => null, 'label' => false)) ?></td>
            <td class="col-md-1"><?= $this->Form->input('InvoiceLine.0.item_quantity', array('class' => 'form-control', 'div' => null, 'label' => false)) ?></td>
            <td><?= $this->Form->input('InvoiceLine.0.amount', array('class' => 'form-control', 'div' => null, 'label' => false)) ?></td>
        </tr>
    </table>
</div>

<div class="row">
    <div class="col-md-3">
        <?php
        echo $this->Form->input('gross_amount', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
        echo $this->Form->input('net_amount', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
        ?>
    </div>
    <div class="col-md-3">
        <?php
        echo $this->Form->input('tax_rate', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
        echo $this->Form->input('tax_amount', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
        ?>    
    </div>
</div>

<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left'))); ?>

<div class="btn-group form-actions pull-right">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Invoices'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>
</div>
