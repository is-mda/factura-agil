<h1 class="main-title"><span class="glyphicon glyphicon-list-alt"></span> <?= __('Orders') . ' ' . __('management') ?></h1>
<?php if (!empty($orders)): ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><?php echo __('Orders'); ?></div>

        <table class="table table-striped table-hover">
            <tr>
                <th><?php echo $this->Paginator->sort('company_name'); ?></th>
                <th><?php echo $this->Paginator->sort('client_name'); ?></th>
                <th><?php echo $this->Paginator->sort('document_date'); ?></th>
                <th><?php echo $this->Paginator->sort('code'); ?></th>
                <th><?php echo $this->Paginator->sort('gross_amount'); ?></th>
                <th><?php echo $this->Paginator->sort('estimated_delivery_date'); ?></th>
                <th class="actions"></th>
            </tr>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($order['Document']['company_name'], array('controller' => 'companies', 'action' => 'edit', $order['Document']['company_id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($order['Document']['client_name'], array('controller' => 'clients', 'action' => 'edit', $order['Document']['company_id'])); ?>
                    </td>
                    <td><?php echo h($order['Document']['document_date']); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link($order['Document']['code'], array('action' => 'edit', $order['Order']['id'])); ?></td>
                    <td><?= $this->Number->currency($order['Order']['gross_amount'], 'EUR'); ?>&nbsp;</td>
                    <td><?php echo h($order['Order']['estimated_delivery_date']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>', array('action' => 'view', $order['Order']['id']), array('escape' => false, 'class' => 'external')); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-print"></span>', array('action' => 'view', $order['Order']['id'], 'print' => 1), array('escape' => false, 'class' => 'external')); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $order['Order']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $order['Order']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= $this->element('pagination') ?>
<?php else: ?>
    <div class="alert alert-warning"><span class="glyphicon glyphicon-bell"></span> <?php echo __('No orders data') ?></div>
<?php endif; ?>
<div class="btn-group actions">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Order'), array('action' => 'add'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>    
</div>