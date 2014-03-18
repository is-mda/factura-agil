<h1 class="main-title"><span class="glyphicon glyphicon-list-alt"></span> <?= __('Companies') . ' ' . __('management') ?></h1>

<?php if (!empty($companies)): ?>
<div class="panel panel-primary">
        <div class="panel-heading"><?php echo __('Companies'); ?></div>

        <table class="table table-striped table-hover">
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('fiscal_code'); ?></th>
                <th><?php echo $this->Paginator->sort('address'); ?></th>
                <th><?php echo $this->Paginator->sort('country'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="actions"></th>
            </tr>
            <?php foreach ($companies as $company): ?>
                <tr>
                    <td><?php echo h($company['Company']['name']); ?>&nbsp;</td>
                    <td><?php echo h($company['Company']['fiscal_code']); ?>&nbsp;</td>
                    <td><?php echo h($company['Company']['address']); ?>&nbsp;</td>
                    <td><?php echo h($this->Country->get($company['Company']['country'])); ?>&nbsp;</td>
                    <td><?php echo h($company['Company']['created']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-star' . ((!empty($currentCompany) and $currentCompany['Company']['id'] == $company['Company']['id']) ? '': '-empty') . '"></span>', array('action' => 'select', $company['Company']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $company['Company']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $company['Company']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?= $this->element('pagination') ?>

<?php else: ?><div class="alert alert-warning"><span class="glyphicon glyphicon-bell"></span> <?php echo __('No companies data') ?></div><?php endif; ?>
<div class="btn-group actions pull-left">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Company'), array('action' => 'add'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>    
</div>