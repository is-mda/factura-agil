<?= $this->element('Documents/document_view', array('panelType' => 'primary')) ?>

<?php
$company = $document['Document']['Company'];
$address = $document['DeliveryAddress'];
?>
<div class="row">
    <div class="col-xs-5">
        <div class="panel panel-primary">
            <div class="panel-heading"><?= __('Delivery') ?></div>
            <div class="panel-body">
                <strong><?= __('Delivery date') ?></strong><br>
                <?= h($document['DeliveryNote']['delivery_date']); ?><br>                
                <strong><?= __('Address') ?></strong><br>
                <?= h($address['address']); ?><br>
                <strong><?= __('City') . ' / ' . __('Postal code') ?></strong><br>
                <?= h($address['city']); ?> [<?= h($address['postal_code']); ?>]<br>
                <strong><?= __('Country') ?></strong><br>
                <?= h($this->Country->get($address['country'])); ?><br>

            </div>
        </div>
    </div>
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