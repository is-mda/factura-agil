<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<h1 class="main-title"><span class="glyphicon glyphicon-<?= (strpos($action, 'add') === false)?'edit':'plus-sign' ?>"></span> <?= Inflector::humanize($action); ?> <?= $singularHumanName ?></h1>

<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('role' => 'form')); ?>\n"; ?>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->Form->input('{$field}', array('class' => 'form-control', 'div' => array('class' => 'form-group')));\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}', array('class' => 'form-control', 'div' => array('class' => 'form-group')));\n";
			}
		}
		echo "\t?>\n";
	echo "<?php echo \$this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-success btn-sm', 'div' => array('class' => 'pull-left') )); ?>\n";
?>

<div class="btn-group form-actions pull-right">

<?php if (strpos($action, 'add') === false): ?>
		<?php echo "<?php echo \$this->Form->postLink('<span class=\"glyphicon glyphicon-remove\"></span> ' . __('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('class' => 'btn btn-danger btn-sm', 'escape' => false), __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?>
<?php endif; ?>
		<?php echo "<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-list-alt\"></span> ' . __('List " . $pluralHumanName . "'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?>"; ?>
<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
            				echo "\t\t<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-list-alt\"></span> ' . __('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), array('class' => 'btn btn-default btn-sm', 'escape' => false)); ?>\n";
                			echo "\t\t<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-plus-sign\"></span> ' . __('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => 'btn btn-default btn-sm', 'escape' => false)); ?>\n";
					$done[] = $details['controller'];
				}
			}
		}
?>
</div>

<div class="clearfix"></div>
