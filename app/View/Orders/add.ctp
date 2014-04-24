<h1 class="main-title"><span class="glyphicon glyphicon-plus-sign"></span> <?= __('Add Order') ?></h1>

<?= $this->element('Documents/order_form', array('panelType' => 'primary')); ?>

<div class="btn-group form-actions pull-right">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Orders'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>
</div>
