<h1 class="main-title"><span class="glyphicon glyphicon-edit"></span> <?= __('Edit Invoice') ?></h1>

<?= $this->element('invoice_form'); ?>

<div class="btn-group form-actions pull-right">
    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ' . __('Delete'), array('action' => 'delete', $this->Form->value('Invoice.id')), array('class' => 'btn btn-danger btn-sm', 'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Invoice.id'))); ?>
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Invoices'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>
</div>
