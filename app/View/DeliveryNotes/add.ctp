<h1 class="main-title"><span class="glyphicon glyphicon-plus-sign"></span> <?= __('Add Delivery Note') ?></h1>

<?= $this->element('Documents/delivery_note_form', array('panelType' => 'primary')); ?>

<div class="btn-group form-actions pull-right">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Delivery Notes'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>
</div>
