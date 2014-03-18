<?php
$invoiceLines = $this->request->data('InvoiceLine');
$invoiceLineCount = empty($invoiceLines) ? 1 : count($invoiceLines);
?>
<div class="panel panel-primary">
    <div class="panel-heading"><?= __('Invoice lines') ?></div>
    <table class="table table-striped table-hover" id="invoice-lines">
        <thead>
            <tr>
                <th></th>
                <th><?php echo __('Item name'); ?></th>
                <th><?php echo __('Price'); ?></th>
                <th><?php echo __('Quantity'); ?></th>
                <th><?php echo __('Amount'); ?></th>
            </tr>            
        </thead>
        <tbody>
            <?php for ($i = 0; $i < $invoiceLineCount; $i++): ?>
                <tr>
                    <td class="check"><input type="checkbox"><?php if($this->request->data("InvoiceLine.$i.id")) echo $this->Form->hidden("InvoiceLine.$i.id"); ?></td>
                    <td class="col-md-5"><?= $this->Form->input("InvoiceLine.$i.item_name", array('class' => 'form-control', 'data-field' => 'InvoiceLine.item_name', 'div' => null, 'label' => false)) ?></td>
                    <td><?= $this->Form->input("InvoiceLine.$i.item_price", array('class' => 'form-control currency', 'type' => 'text', 'data-evaluable' => '1', 'data-field' => 'InvoiceLine.item_price', 'div' => null, 'label' => false)) ?></td>
                    <td class="col-md-1"><?= $this->Form->input("InvoiceLine.$i.item_quantity", array('class' => 'form-control quantity', 'data-evaluable' => '1', 'data-field' => 'InvoiceLine.item_quantity', 'div' => null, 'label' => false)) ?></td>
                    <td><?= $this->Form->input("InvoiceLine.$i.amount", array('class' => 'form-control currency', 'readonly', 'type' => 'text', 'data-field' => 'InvoiceLine.amount', 'div' => null, 'label' => false)) ?></td>
                </tr>            
            <?php endfor; ?>
        </tbody>
    </table>
</div>