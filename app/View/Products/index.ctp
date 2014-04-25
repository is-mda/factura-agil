<h1 class="main-title"><span class="glyphicon glyphicon-list-alt"></span> <?= __('Products') . ' ' . __('management') ?></h1>
<?php if (!empty($products)): ?><div class="panel panel-primary">
        <div class="panel-heading"><?php echo __('Products'); ?></div>

        <table class="table table-striped table-hover">
            <tr>
                <th><?php echo $this->Paginator->sort('code'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('description'); ?></th>
                <th><?php echo $this->Paginator->sort('price'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="actions"></th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo h($product['Product']['code']); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link($product['Product']['name'], array('action' => 'edit', $product['Product']['id'])); ?>&nbsp;</td>
                    <td><?php echo h($product['Product']['description']); ?>&nbsp;</td>
                    <td><?= $this->Number->currency($product['Product']['price'], 'EUR'); ?>&nbsp;</td>
                    <td><?php echo h($product['Product']['created']); ?>&nbsp;</td>
                    <td class="actions">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $product['Product']['id']), array('escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-default btn-sm')); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ', array('action' => 'delete', $product['Product']['id']), array('escape' => false, 'title' => __('Delete'), 'class' => 'btn btn-default btn-sm'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
                        </div>                         
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= $this->element('pagination') ?><?php else: ?><div class="alert alert-warning"><span class="glyphicon glyphicon-bell"></span> <?php echo __('No products data') ?></div>
<?php endif; ?>
<div class="btn-group actions">
    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Product'), array('action' => 'add'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>
</div>