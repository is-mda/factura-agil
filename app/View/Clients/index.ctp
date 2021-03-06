<h1 class="main-title"><span class="glyphicon glyphicon-list-alt"></span> <?= __('Clients') . ' ' . __('management') ?></h1>
<?= $this->element('clients_filters') ?>
<?php if (!empty($clients)): ?>
    <div class="panel panel-primary">
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
                    <td><?php echo $this->Html->link($client['Client']['name'], array('action' => 'edit', $client['Client']['id'])); ?>&nbsp;</td>
                    <td><?php echo h($client['Client']['fiscal_code']); ?>&nbsp;</td>
                    <td><?php echo h($client['Client']['email']); ?>&nbsp;</td>
                    <td><?php echo h($this->Country->get($client['Client']['country'])); ?>&nbsp;</td>
                    <td><?php echo h($client['Client']['phone']); ?>&nbsp;</td>
                    <td><?php echo h($client['Client']['created']); ?>&nbsp;</td>
                    <td class="actions">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $client['Client']['id']), array('escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-default btn-sm')); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $client['Client']['id']), array('escape' => false, 'title' => __('Delete'), 'class' => 'btn btn-default btn-sm delete'), __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?>
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span> ' . __('Order'), array('controller' => 'orders', 'action' => 'add', $client['Client']['id']), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-send"></span> ' . __('Delivery Note'), array('controller' => 'delivery_notes', 'action' => 'add', $client['Client']['id']), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> ' . __('Invoice'), array('controller' => 'invoices', 'action' => 'add', $client['Client']['id']), array('escape' => false)); ?></li>
                            </ul>                            
                        </div>                            
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= $this->element('pagination') ?><?php else: ?><div class="alert alert-warning"><span class="glyphicon glyphicon-bell"></span> <?php echo __('No clients data') ?></div>
<?php endif; ?>
<div class="btn-group actions">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Client'), array('action' => 'add'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>    </div>