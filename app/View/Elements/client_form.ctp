<?php echo $this->Form->create('Client', array('role' => 'form')); ?>
<?php
if ($this->request->data('Client.id'))
    echo $this->Form->input('id', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('email', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('phone', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('fax', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('iban', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('tax_rate', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= __('Main address') ?>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->input('address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('postal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('country', array('options' => $this->Country->get(), 'empty' => true, 'class' => 'form-control', 'div' => array('class' => 'form-group')));
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= __('Delivery Address') ?>
            </div>
            <div class="panel-body">
                <?php
                if ($this->request->data('DeliveryAddress.id'))
                    echo $this->Form->input('DeliveryAddress.id', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('DeliveryAddress.address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('DeliveryAddress.city', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('DeliveryAddress.postal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('DeliveryAddress.country', array('options' => $this->Country->get(), 'empty' => true, 'class' => 'form-control', 'div' => array('class' => 'form-group')));
                ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left'))); ?>
