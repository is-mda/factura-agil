<h1 class="main-title"><span class="glyphicon glyphicon-list-alt"></span> <?= __('Invoices') . ' ' . __('management') ?></h1>
<?php if(!empty($invoices)): ?>
<div class="panel panel-primary">
    <div class="panel-heading"><?php echo __('Invoices'); ?></div>
    
	<table class="table table-striped table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('company_name'); ?></th>
			<th><?php echo $this->Paginator->sort('client_name'); ?></th>
			<th><?php echo $this->Paginator->sort('invoice_date'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('gross_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('tax_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('net_amount'); ?></th>
	                <th class="actions"></th>
	</tr>
	<?php foreach ($invoices as $invoice): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($invoice['Company']['name'], array('controller' => 'companies', 'action' => 'edit', $invoice['Company']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($invoice['Client']['name'], array('controller' => 'clients', 'action' => 'edit', $invoice['Client']['id'])); ?>
		</td>
		<td><?php echo h($invoice['Invoice']['invoice_date']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['code']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['gross_amount']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['tax_amount']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['net_amount']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $invoice['Invoice']['id']), array('escape' => false)); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $invoice['Invoice']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $invoice['Invoice']['id'])); ?>
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