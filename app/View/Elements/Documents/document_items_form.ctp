<?php
$documentItems = $this->request->data('Document.DocumentItem');
$documentItemCount = empty($documentItems) ? 1 : count($documentItems);
?>
<div class="well well-sm pull-right form-inline barcode-wrapper">
    <span class="glyphicon glyphicon-barcode"></span>
    <input id="barcode" class="form-control">
</div>
<div class="clearfix"></div>
<div class="panel panel-<?= $panelType; ?>">
    <div class="panel-heading"><?= __('Document items') ?></div>
    <table class="table table-striped table-hover" id="document-items">
        <thead>
            <tr>
                <th></th>
                <th><?php echo __('Code'); ?></th>
                <th><?php echo __('Name'); ?></th>
                <th><?php echo __('Price'); ?></th>
                <th><?php echo __('Quantity'); ?></th>
                <th><?php echo __('Amount'); ?></th>
            </tr>            
        </thead>
        <tbody>
            <?php for ($i = 0; $i < $documentItemCount; $i++): ?>
                <tr>
                    <td class="check"><input type="checkbox"><?php if($this->request->data("Document.DocumentItem.$i.id")) echo $this->Form->hidden("Document.DocumentItem.$i.id"); ?></td>
                    <td><?= $this->Form->input("Document.DocumentItem.$i.code", array('class' => 'form-control', 'readonly', 'data-field' => 'Document.DocumentItem.code', 'div' => null, 'label' => false)) ?></td>
                    <td class="col-md-5"><?= $this->Form->input("Document.DocumentItem.$i.name", array('class' => 'form-control', 'data-field' => 'Document.DocumentItem.name', 'div' => null, 'label' => false)) ?></td>
                    <td class="col-md-2"><?= $this->Form->input("Document.DocumentItem.$i.price", array('class' => 'form-control currency', 'type' => 'text', 'data-evaluable' => '1', 'data-field' => 'Document.DocumentItem.price', 'div' => null, 'label' => false)) ?></td>
                    <td class="col-md-1"><?= $this->Form->input("Document.DocumentItem.$i.quantity", array('class' => 'form-control quantity', 'data-evaluable' => '1', 'data-field' => 'Document.DocumentItem.quantity', 'div' => null, 'label' => false)) ?></td>
                    <td class="col-md-2"><?= $this->Form->input("Document.DocumentItem.$i.amount", array('class' => 'form-control currency', 'readonly', 'type' => 'text', 'data-field' => 'Document.DocumentItem.amount', 'div' => null, 'label' => false)) ?></td>
                </tr>            
            <?php endfor; ?>
        </tbody>
    </table>
</div>