<?php
$documentItems = $this->request->data('Document.DocumentItem');
$documentItemCount = empty($documentItems) ? 1 : count($documentItems);
?>
<div class="panel panel-primary">
    <div class="panel-heading"><?= __('Document items') ?></div>
    <table class="table table-striped table-hover" id="document-items">
        <thead>
            <tr>
                <th></th>
                <th><?php echo __('Item code'); ?></th>
                <th><?php echo __('Item name'); ?></th>
                <th><?php echo __('Price'); ?></th>
                <th><?php echo __('Quantity'); ?></th>
                <th><?php echo __('Amount'); ?></th>
            </tr>            
        </thead>
        <tbody>
            <?php for ($i = 0; $i < $documentItemCount; $i++): ?>
                <tr>
                    <td class="check"><input type="checkbox"><?php if($this->request->data("Document.DocumentItem.$i.id")) echo $this->Form->hidden("Document.DocumentItem.$i.id"); ?></td>
                    <td><?= $this->Form->input("Document.DocumentItem.$i.item_code", array('class' => 'form-control', 'data-field' => 'Document.DocumentItem.item_code', 'div' => null, 'label' => false)) ?></td>
                    <td class="col-md-5"><?= $this->Form->input("Document.DocumentItem.$i.item_name", array('class' => 'form-control', 'data-field' => 'Document.DocumentItem.item_name', 'div' => null, 'label' => false)) ?></td>
                    <td class="col-md-2"><?= $this->Form->input("Document.DocumentItem.$i.item_price", array('class' => 'form-control currency', 'type' => 'text', 'data-evaluable' => '1', 'data-field' => 'Document.DocumentItem.item_price', 'div' => null, 'label' => false)) ?></td>
                    <td class="col-md-1"><?= $this->Form->input("Document.DocumentItem.$i.item_quantity", array('class' => 'form-control quantity', 'data-evaluable' => '1', 'data-field' => 'Document.DocumentItem.item_quantity', 'div' => null, 'label' => false)) ?></td>
                    <td class="col-md-2"><?= $this->Form->input("Document.DocumentItem.$i.amount", array('class' => 'form-control currency', 'readonly', 'type' => 'text', 'data-field' => 'Document.DocumentItem.amount', 'div' => null, 'label' => false)) ?></td>
                </tr>            
            <?php endfor; ?>
        </tbody>
    </table>
</div>