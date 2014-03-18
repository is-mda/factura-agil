<?php echo $this->Form->create('Company', array('role' => 'form')); ?>
<?php
if ($this->request->data('Company.id'))
    echo $this->Form->input('id', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('name', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('fiscal_code', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('address', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
echo $this->Form->input('country', array('options' => $this->Country->get(), 'empty' => true, 'class' => 'form-control', 'div' => array('class' => 'form-group')));
?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= __('Bank data') ?>
            </div>
            <div class="panel-body">
                <?= $this->Form->input('bank_account_owner', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                <div class="row">
                    <div class="col-md-8">
                        <?= $this->Form->input('bank_name', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->input('swift', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>              
                    </div>
                </div>
                <?= $this->Form->input('iban', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= __('Contact data') ?>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->input('contact_person', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('contact_email', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('contact_phone', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left'))); ?>
