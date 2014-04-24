<h1 class="main-title"><span class="glyphicon glyphicon-plus-sign"></span> <?= __('Add Product') ?></h1>

<?= $this->element('product_form'); ?>

<div class="form-actions pull-right">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Products'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>
</div>
