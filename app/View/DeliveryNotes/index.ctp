<h1 class="main-title"><span class="glyphicon glyphicon-list-alt"></span> <?= __('Delivery notes') . ' ' . __('management') ?></h1>
<?php if (!empty($deliveryNotes)): ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><?php echo __('Delivery Notes'); ?></div>

        <table class="table table-striped table-hover">
            <tr>
                <th><?php echo $this->Paginator->sort('code'); ?></th>
                <th><?php echo $this->Paginator->sort('company_name'); ?></th>
                <th><?php echo $this->Paginator->sort('client_name'); ?></th>
                <th><?php echo $this->Paginator->sort('document_date'); ?></th>
                <th><?php echo $this->Paginator->sort('delivery_date'); ?></th>
                <th class="actions"></th>
            </tr>
            <?php foreach ($deliveryNotes as $deliveryNote): ?>
                <tr>
                    <td><?php echo $this->Html->link($deliveryNote['Document']['code'], array('action' => 'edit', $deliveryNote['DeliveryNote']['id'])); ?></td>
                    <td>
                        <?php echo $this->Html->link($deliveryNote['Document']['company_name'], array('controller' => 'companies', 'action' => 'edit', $deliveryNote['Document']['company_id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($deliveryNote['Document']['client_name'], array('controller' => 'clients', 'action' => 'edit', $deliveryNote['Document']['company_id'])); ?>
                    </td>
                    <td><?php echo h($deliveryNote['Document']['document_date']); ?>&nbsp;</td>
                    <td><?php echo h($deliveryNote['DeliveryNote']['delivery_date']); ?>&nbsp;</td>
                    <td class="actions">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>', array('action' => 'view', $deliveryNote['DeliveryNote']['id']), array('escape' => false, 'title' => __('View'), 'class' => 'external btn btn-default btn-sm')); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $deliveryNote['DeliveryNote']['id']), array('escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-default btn-sm')); ?>
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-print"></span> ' . __('Print'), array('action' => 'view', $deliveryNote['DeliveryNote']['id'], 'print' => 1), array('escape' => false, 'class' => 'external')); ?></li>
                                <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ' . __('Delete'), array('action' => 'delete', $deliveryNote['DeliveryNote']['id']), array('escape' => false, 'class' => 'delete'), __('Are you sure you want to delete # %s?', $deliveryNote['DeliveryNote']['id'])); ?></li>
                            </ul>
                        </div>                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= $this->element('pagination') ?>
<?php else: ?>
    <div class="alert alert-warning"><span class="glyphicon glyphicon-bell"></span> <?php echo __('No delivery notes data') ?></div>
<?php endif; ?>
<div class="btn-group actions">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Delivery Note'), array('action' => 'add'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>    
</div>