<h1 class="main-title"><span class="glyphicon glyphicon-list-alt"></span> <?= __('Clients') . ' ' . __('management') ?></h1>
<?php if (!empty($clients)): ?><div class="panel panel-primary">
        <div class="panel-heading"><?php echo __('Clients'); ?></div>

        <table class="table table-striped table-hover">
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('fiscal_code'); ?></th>
                <th><?php echo $this->Paginator->sort('email'); ?></th>
                <th><?php echo $this->Paginator->sort('country'); ?></th>
                <th><?php echo $this->Paginator->sort('phone'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="actions"></th>
            </tr>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?php echo h($client['Client']['name']); ?>&nbsp;</td>
                    <td><?php echo h($client['Client']['fiscal_code']); ?>&nbsp;</td>
                    <td><?php echo h($client['Client']['email']); ?>&nbsp;</td>
                    <td><?php echo h($client['Client']['country']); ?>&nbsp;</td>
                    <td><?php echo h($client['Client']['phone']); ?>&nbsp;</td>
                    <td><?php echo h($client['Client']['created']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $client['Client']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $client['Client']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= $this->element('pagination') ?><?php else: ?><div class="alert alert-warning"><span class="glyphicon glyphicon-bell"></span> <?php echo __('No clients data') ?></div>
<?php endif; ?>
<div class="btn-group actions">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Client'), array('action' => 'add'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>    </div>