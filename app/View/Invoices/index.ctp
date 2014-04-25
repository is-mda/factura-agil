<h1 class="main-title"><span class="glyphicon glyphicon-list-alt"></span> <?= __('Invoices') . ' ' . __('management') ?></h1>
<?php if (!empty($invoices)): ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><?php echo __('Invoices'); ?></div>

        <table class="table table-striped table-hover">
            <tr>
                <th><?php echo $this->Paginator->sort('code'); ?></th>
                <th><?php echo $this->Paginator->sort('company_name'); ?></th>
                <th><?php echo $this->Paginator->sort('client_name'); ?></th>
                <th><?php echo $this->Paginator->sort('document_date'); ?></th>
                <th><?php echo $this->Paginator->sort('gross_amount'); ?></th>
                <th><?php echo $this->Paginator->sort('tax_amount'); ?></th>
                <th><?php echo $this->Paginator->sort('net_amount'); ?></th>
                <th class="actions"></th>
            </tr>
            <?php foreach ($invoices as $invoice): ?>
                <tr>
                    <td><?php echo $this->Html->link($invoice['Document']['code'], array('action' => 'edit', $invoice['Invoice']['id'])); ?></td>
                    <td>
                        <?php echo $this->Html->link($invoice['Document']['company_name'], array('controller' => 'companies', 'action' => 'edit', $invoice['Document']['company_id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($invoice['Document']['client_name'], array('controller' => 'clients', 'action' => 'edit', $invoice['Document']['company_id'])); ?>
                    </td>
                    <td><?php echo h($invoice['Document']['document_date']); ?>&nbsp;</td>
                    <td><?= $this->Number->currency($invoice['Invoice']['gross_amount'], 'EUR'); ?>&nbsp;</td>
                    <td><?= $this->Number->currency($invoice['Invoice']['tax_amount'], 'EUR'); ?>&nbsp;</td>
                    <td><?= $this->Number->currency($invoice['Invoice']['net_amount'], 'EUR'); ?>&nbsp;</td>
                    <td class="actions">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>', array('action' => 'view', $invoice['Invoice']['id']), array('escape' => false, 'title' => __('View'), 'class' => 'external btn btn-default btn-sm')); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $invoice['Invoice']['id']), array('escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-default btn-sm')); ?>
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-print"></span> ' . __('Print'), array('action' => 'view', $invoice['Invoice']['id'], 'print' => 1), array('escape' => false, 'class' => 'external')); ?></li>
                                <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ' . __('Delete'), array('action' => 'delete', $invoice['Invoice']['id']), array('escape' => false, 'class' => 'delete'), __('Are you sure you want to delete # %s?', $invoice['Invoice']['id'])); ?></li>
                            </ul>
                        </div> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= $this->element('pagination') ?>
<?php else: ?>
    <div class="alert alert-warning"><span class="glyphicon glyphicon-bell"></span> <?php echo __('No invoices data') ?></div>
<?php endif; ?>
<div class="btn-group actions">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Invoice'), array('action' => 'add'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>    
</div>