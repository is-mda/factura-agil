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
<h1 class="main-title"><span class="glyphicon glyphicon-list-alt"></span> <?php echo "<?= __('{$pluralHumanName}') . ' ' . __('management') ?>"; ?></h1>

<div class="panel panel-primary">
    <div class="panel-heading"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></div>
    
	<table class="table table-striped table-hover">
	<tr>
	<?php foreach ($fields as $field): ?>
		<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
	<?php endforeach; ?>
                <th class="actions"></th>
	</tr>
	<?php
	echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
			}
		}

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-edit\"></span>', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false)); ?>\n";                
		echo "\t\t\t<?php echo \$this->Form->postLink('<span class=\"glyphicon glyphicon-remove\"></span>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
	?>
	</table>
        <?= '<?php if($this->Paginator->hasPrev() or $this->Paginator->hasNext()): ?>' ?>
	<ul class="pagination">
	<?= "\t\t<li><?= \$this->Paginator->prev('&laquo;', array('escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false)) ?></li>\n" ?>
	<?= "\t\t<?= \$this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')) ?>\n" ?>
        <?= "\t\t<li><?= \$this->Paginator->next('&raquo;', array('escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false)) ?></li>\n" ?>	
	</ul>
        <?= '<?php endif; ?>' ?>
</div>

<div class="btn-group actions">
    <?php echo "<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-plus-sign\"></span> ' . __('New " . $singularHumanName . "'), array('action' => 'add'), array('class' => 'btn btn-default btn-sm', 'escape' => false)); ?>"; ?>
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