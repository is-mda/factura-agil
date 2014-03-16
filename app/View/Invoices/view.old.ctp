<div class="invoices view">
<h2><?php echo __('Invoice'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($invoice['Company']['name'], array('controller' => 'companies', 'action' => 'view', $invoice['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Fiscal Code'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['company_fiscal_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Address'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['company_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Country'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['company_country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($invoice['Client']['name'], array('controller' => 'clients', 'action' => 'view', $invoice['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Name'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['client_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Fiscal Code'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['client_fiscal_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Address'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['client_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Country'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['client_country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Invoice Date'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['invoice_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gross Amount'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['gross_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax Rate'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['tax_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax Amount'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['tax_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Net Amount'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['net_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Invoice'), array('action' => 'edit', $invoice['Invoice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Invoice'), array('action' => 'delete', $invoice['Invoice']['id']), null, __('Are you sure you want to delete # %s?', $invoice['Invoice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoice Lines'), array('controller' => 'invoice_lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice Line'), array('controller' => 'invoice_lines', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Invoice Lines'); ?></h3>
	<?php if (!empty($invoice['InvoiceLine'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Item Name'); ?></th>
		<th><?php echo __('Item Quantity'); ?></th>
		<th><?php echo __('Item Price'); ?></th>
		<th><?php echo __('Invoice Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($invoice['InvoiceLine'] as $invoiceLine): ?>
		<tr>
			<td><?php echo $invoiceLine['id']; ?></td>
			<td><?php echo $invoiceLine['item_name']; ?></td>
			<td><?php echo $invoiceLine['item_quantity']; ?></td>
			<td><?php echo $invoiceLine['item_price']; ?></td>
			<td><?php echo $invoiceLine['invoice_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'invoice_lines', 'action' => 'view', $invoiceLine['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'invoice_lines', 'action' => 'edit', $invoiceLine['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'invoice_lines', 'action' => 'delete', $invoiceLine['id']), null, __('Are you sure you want to delete # %s?', $invoiceLine['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Invoice Line'), array('controller' => 'invoice_lines', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
