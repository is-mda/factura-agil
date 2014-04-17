<div class="row">
    <div class="col-xs-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                From: <?= $this->Html->tag('strong', $invoice['Invoice']['company_name']); ?>
            </div>
            <div class="panel-body">
                <p>
                    <?= h($invoice['Invoice']['company_fiscal_code']); ?> <br>
                    <?= h($invoice['Invoice']['company_address']); ?> <br>
                    <?= h($this->Country->get($invoice['Invoice']['company_country'])); ?> <br>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-5 col-xs-offset-2 text-right">
        <div class="panel panel-primary">
            <div class="panel-heading">
                To: <?= $this->Html->tag('strong', $invoice['Invoice']['client_name']); ?>
            </div>
            <div class="panel-body">
                <p>
                    <?= h($invoice['Invoice']['client_fiscal_code']); ?> <br>
                    <?= h($invoice['Invoice']['client_address']); ?> <br>
                    <?= h($this->Country->get($invoice['Invoice']['client_country'])); ?> <br>
                </p>
            </div>
        </div>
    </div>
</div> <!-- / end client details section -->

<div class="panel panel-primary">
    <div class="panel-heading">
        <?= __('Invoice details'); ?>
    </div>
    <table class="table table-bordered">
        <thead>
        <th><?= __('Item Name'); ?></th>
        <th><?= __('Item Quantity'); ?></th>
        <th><?= __('Item Price'); ?></th>
        <th><?= __('Amount'); ?></th>
        </thead>
        <tbody>
            <?php foreach ($invoice['InvoiceLine'] as $invoiceLine): ?>
                <tr>
                    <td><?= $invoiceLine['item_name']; ?></td>
                    <td class="text-right"><?= $invoiceLine['item_quantity']; ?></td>
                    <td class="text-right"><?= $this->Number->currency($invoiceLine['item_price'], 'EUR'); ?></td>
                    <td class="text-right"><?= $this->Number->currency($invoiceLine['amount'], 'EUR'); ?></td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>
</div>
