<h1 class="main-title"><span class="glyphicon glyphicon-edit"></span> <?= __('Edit Delivery Note') ?></h1>

<?= $this->element('Documents/delivery_note_form', array('panelType' => 'primary')); ?>

<div class="form-actions pull-right">
    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ' . __('Delete'), array('action' => 'delete', $this->Form->value('DeliveryNote.id')), array('class' => 'btn btn-danger btn-sm', 'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('DeliveryNote.id'))); ?>
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Delivery Notes'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>
</div>
