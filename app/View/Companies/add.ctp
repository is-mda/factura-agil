<h1 class="main-title"><span class="glyphicon glyphicon-plus-sign"></span> <?= __('Add Company') ?></h1>

<?= $this->element('company_form') ?>

<div class="btn-group form-actions pull-right">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> ' . __('List Companies'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>
</div>
