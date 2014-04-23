<div class="text-right">
    <h1 class="main-title"><?= __($documentName) ?>
        <small>#<?= h($document['Document']['code']); ?></small></h1>
</div>

<div class="row">
    <div class="col-xs-5">
        <div class="panel panel-<?= $panelType; ?>">
            <div class="panel-heading">
                From: <?= $this->Html->tag('strong', $document['Document']['company_name']); ?>
            </div>
            <div class="panel-body">
                <p>
                    <?= h($document['Document']['company_fiscal_code']); ?> <br>
                    <?= h($document['Document']['company_address']); ?> <br>
                    <?= h($this->Country->get($document['Document']['company_country'])); ?> <br>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-5 col-xs-offset-2 text-right">
        <div class="panel panel-<?= $panelType; ?>">
            <div class="panel-heading">
                To: <?= $this->Html->tag('strong', $document['Document']['client_name']); ?>
            </div>
            <div class="panel-body">
                <p>
                    <?= h($document['Document']['client_fiscal_code']); ?> <br>
                    <?= h($document['Document']['client_address']); ?> <br>
                    <?= h($this->Country->get($document['Document']['client_country'])); ?> <br>
                </p>
            </div>
        </div>
    </div>
</div> <!-- / end client details section -->

<div class="panel panel-<?= $panelType; ?>">
    <div class="panel-heading">
        <?= __('Document details'); ?>
    </div>
    <table class="table table-bordered">
        <thead>
        <th><?= __('Code'); ?></th>
        <th><?= __('Name'); ?></th>
        <th><?= __('Quantity'); ?></th>
        <th><?= __('Price'); ?></th>
        <th><?= __('Amount'); ?></th>
        </thead>
        <tbody>
            <?php foreach ($document['Document']['DocumentItem'] as $documentItem): ?>
                <tr>
                    <td><?= $documentItem['code']; ?></td>
                    <td><?= $documentItem['name']; ?></td>
                    <td class="text-right"><?= $documentItem['quantity']; ?></td>
                    <td class="text-right"><?= $this->Number->currency($documentItem['price'], 'EUR'); ?></td>
                    <td class="text-right"><?= $this->Number->currency($documentItem['amount'], 'EUR'); ?></td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>
</div>
