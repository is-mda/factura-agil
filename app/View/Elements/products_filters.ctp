<?php echo $this->Form->create('Product', array('role' => 'form', 'type' => 'get')); ?>
<div class="panel panel-primary panel-collapse filters">
  <div class="panel-heading"><?= __('Filters') ?><span class="glyphicon pull-right glyphicon-chevron-down"></span></div>
  <div class="panel-body">
    <div class="form-horizontal">
        <div class="form-group">
          <?= $this->Form->label('name', __('Name'), array('class' => 'col-sm-1 control-label')); ?>
          <?= $this->Form->input('name', array('name' => 'filter[Product.name]', 'required' => false, 'value' => !empty($this->request->query['filter']['Product.name'])? $this->request->query['filter']['Product.name'] : '', 'class' => 'form-control', 'div' => array('class' => 'col-sm-4'), 'label' => false)); ?>
          <?= $this->Form->label('code', __('Code'), array('class' => 'col-sm-1 control-label')); ?>
          <?= $this->Form->input('code', array('name' => 'filter[Product.code]', 'required' => false, 'value' => !empty($this->request->query['filter']['Product.code'])? $this->request->query['filter']['Product.code'] : null,  'class' => 'form-control', 'div' => array('class' => 'col-sm-3'), 'label' => false)); ?>
          <div class="col-sm-3">
            <div class="pull-right">
              <input type="reset" value="<?= __('Reset filters') ?>" class="btn btn-default" />
              <input type="submit" value="<?= __('Filter products') ?>" class="btn btn-default" />
            </div>               
          </div>              
        </div>
    </div>
  </div>
</div> 
<?php echo $this->Form->end(); ?>