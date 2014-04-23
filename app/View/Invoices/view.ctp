<?= $this->element('Documents/document_view', array('panelType' => 'primary')) ?>

<div class="row text-right">
    <div class="col-xs-2 col-xs-offset-8">
        <p>
            <?= __('Gross') ?>: <br>
            <?= __('Tax') ?>: <br>
            <strong><?= __('Net') ?>:</strong> <br>
        </p>
    </div>
    <div class="col-xs-2">
        <?= $this->Number->currency($document['Invoice']['gross_amount'], 'EUR'); ?> <br>
        <?= $this->Number->currency($document['Invoice']['tax_amount'], 'EUR'); ?> <br>
        <strong><?= $this->Number->currency($document['Invoice']['net_amount'], 'EUR'); ?></strong> <br>
    </div>
</div>

<?php
$company = $document['Document']['Company'];
?>
<div class="row">
    <?php if (!empty($company['iban'])): ?>
        <div class="col-xs-5">
            <div class="panel panel-primary">
                <div class="panel-heading"><?= __('Bank details') ?></div>
                <div class="panel-body">
                    <?php if(!empty($company['bank_name'])): ?>
                    <strong><?= __('Bank name & Swift') ?></strong><br>
                    <?= h($company['bank_name']); ?> [<?= h($company['swift']); ?>]<br>
                    <?php endif; ?>
                    <?php if(!empty($company['bank_account_owner'])): ?>
                    <strong><?= __('Account owner') ?></strong><br>
                    <?= h($company['bank_account_owner']); ?><br>
                    <?php endif; ?>
                    <strong><?= __('Iban') ?></strong><br>
                    <?= h($company['iban']); ?><br>
                    
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($company['contact_email'])): ?>
        <div class="col-xs-5 col-xs-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><?= __('Contact details') ?></div>
                <div class="panel-body">
                        <?php if(!empty($company['contact_person'])): ?>
                        <strong><?= __('Person') ?></strong><br>
                        <?= h($company['contact_person']); ?><br>
                        <?php endif; ?>
                        <strong><?= __('Email') ?></strong><br>
                        <?= $this->Html->link($company['contact_email'], "mailto:{$company['contact_email']}"); ?><br>
                        <?php if(!empty($company['contact_phone'])): ?>
                        <strong><?= __('Phone') ?></strong><br>
                        <?= h($company['contact_phone']); ?>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>