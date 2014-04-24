<?php echo $this->Form->create('DeliveryNote', array('role' => 'form', 'id' => 'delivery_note')); ?>

<?= $this->Form->hidden('id'); ?>

<?= $this->element('Documents/document_form', array('panelType' => 'primary')) ?>

<div class="row">
    <div class="col-md-6 form-inline date delivery-note-date">
        <?php
        echo $this->Form->input('delivery_date', array('class' => 'form-control', 'separator' => null, 'div' => array('class' => 'form-group')));
        ?>   
    </div>    
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <?= __('Delivery Address') ?>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <?php if ($this->request->data('DeliveryAddress.id')) echo $this->Form->input('DeliveryAddress.id', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                <?= $this->Form->input('DeliveryAddress.address', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
            </div>    
            <div class="col-md-6">
                <?= $this->Form->input('DeliveryAddress.city', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
            </div>    
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->input('DeliveryAddress.postal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
            </div>    
            <div class="col-md-6">
                <?= $this->Form->input('DeliveryAddress.country', array('options' => $this->Country->get(), 'empty' => true, 'class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
            </div>    
        </div>
    </div>
</div>


<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left'))); ?>
