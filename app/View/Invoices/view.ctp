<div class="text-right">
    <h1 class="main-title">INVOICE
        <small>#<?= h($invoice['Invoice']['code']); ?></small></h1>
</div>

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

<div class="row text-right">
    <div class="col-xs-2 col-xs-offset-8">
        <p>
            <?= __('Gross') ?>: <br>
            <?= __('Tax') ?>: <br>
            <strong><?= __('Net') ?>:</strong> <br>
        </p>
    </div>
    <div class="col-xs-2">
        <?= $this->Number->currency($invoice['Invoice']['gross_amount'], 'EUR'); ?> <br>
        <?= $this->Number->currency($invoice['Invoice']['tax_amount'], 'EUR'); ?> <br>
        <strong><?= $this->Number->currency($invoice['Invoice']['net_amount'], 'EUR'); ?></strong> <br>
    </div>
</div>

<div class="row">
    <?php if (!empty($invoice['Company']['iban'])): ?>
        <div class="col-xs-5">
            <div class="panel panel-info">
                <div class="panel-heading"><?= __('Bank details') ?></div>
                <div class="panel-body">
                    <?php if(!empty($invoice['Company']['bank_name'])): ?>
                    <strong><?= __('Bank name & Swift') ?></strong><br>
                    <?= h($invoice['Company']['bank_name']); ?> [<?= h($invoice['Company']['swift']); ?>]<br>
                    <?php endif; ?>
                    <?php if(!empty($invoice['Company']['bank_account_owner'])): ?>
                    <strong><?= __('Account owner') ?></strong><br>
                    <?= h($invoice['Company']['bank_account_owner']); ?><br>
                    <?php endif; ?>
                    <strong><?= __('Iban') ?></strong><br>
                    <?= h($invoice['Company']['iban']); ?><br>
                    
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($invoice['Company']['contact_email'])): ?>
        <div class="col-xs-5 col-xs-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><?= __('Contact details') ?></div>
                <div class="panel-body">
                    <address>
                        <?php if(!empty($invoice['Company']['contact_person'])): ?>
                        <strong><?= __('Person') ?></strong><br>
                        <?= h($invoice['Company']['contact_person']); ?><br>
                        <?php endif; ?>
                        <strong><?= __('Email') ?></strong><br>
                        <?= $this->Html->link($invoice['Company']['contact_email'], "mailto:{$invoice['Company']['contact_email']}"); ?><br>
                        <?php if(!empty($invoice['Company']['contact_phone'])): ?>
                        <strong><?= __('Phone') ?></strong><br>
                        <?= h($invoice['Company']['contact_phone']); ?>
                        <?php endif; ?>
                    </address>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>