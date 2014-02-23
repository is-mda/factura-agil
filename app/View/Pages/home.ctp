<?php
if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<h1 class="main-title"><span class="glyphicon glyphicon-tasks"></span> <?php echo __d('cake_dev', 'App install status'); ?></h1>
<?php
if (Configure::read('debug') > 0):
	Debugger::checkSecurityKeys();
endif;
?>

<div class="alert alert-info">
    <?php echo __d('cake_dev', 'Your version of CakePHP is %s.', Configure::version()); ?>
</div>

<?php
	if (version_compare(PHP_VERSION, '5.2.8', '>=')):
		echo '<div class="alert alert-success">';
			echo __d('cake_dev', 'Your version of PHP is 5.2.8 or higher.');
		echo '</div>';
	else:
		echo '<div class="alert alert-warning">';
			echo __d('cake_dev', 'Your version of PHP is too low. You need PHP 5.2.8 or higher to use CakePHP.');
		echo '</div>';
	endif;
?>

	<?php
		if (is_writable(TMP)):
			echo '<div class="alert alert-success">';
				echo __d('cake_dev', 'Your tmp directory is writable.');
			echo '</div>';
		else:
			echo '<div class="alert alert-warning">';
				echo __d('cake_dev', 'Your tmp directory is NOT writable.');
			echo '</div>';
		endif;
	?>

	<?php
		$settings = Cache::settings();
		if (!empty($settings)):
			echo '<div class="alert alert-success">';
				echo __d('cake_dev', 'The %s is being used for core caching. To change the config edit %s', '<em>'. $settings['engine'] . 'Engine</em>', 'APP/Config/core.php');
			echo '</div>';
		else:
			echo '<div class="alert alert-warning">';
				echo __d('cake_dev', 'Your cache is NOT working. Please check the settings in %s', 'APP/Config/core.php');
			echo '</div>';
		endif;
	?>

	<?php
		$filePresent = null;
		if (file_exists(APP . 'Config' . DS . 'database.php')):
			echo '<div class="alert alert-success">';
				echo __d('cake_dev', 'Your database configuration file is present.');
				$filePresent = true;
			echo '</div>';
		else:
			echo '<div class="alert alert-warning">';
				echo __d('cake_dev', 'Your database configuration file is NOT present.');
				echo '<br/>';
				echo __d('cake_dev', 'Rename %s to %s', 'APP/Config/database.php.default', 'APP/Config/database.php');
			echo '</div>';
		endif;
	?>

<?php
if (isset($filePresent)):
	App::uses('ConnectionManager', 'Model');
	try {
		$connected = ConnectionManager::getDataSource('default');
	} catch (Exception $connectionError) {
		$connected = false;
		$errorMsg = $connectionError->getMessage();
		if (method_exists($connectionError, 'getAttributes')):
			$attributes = $connectionError->getAttributes();
			if (isset($errorMsg['message'])):
				$errorMsg .= '<br>' . $attributes['message'];
			endif;
		endif;
	}
?>
	<?php
		if ($connected && $connected->isConnected()):
			echo '<div class="alert alert-success">';
				echo __d('cake_dev', 'CakePHP is able to connect to the database.');
			echo '</div>';
		else:
			echo '<div class="alert alert-warning">';
				echo __d('cake_dev', 'CakePHP is NOT able to connect to the database.');
				echo '<br><br>';
				echo $errorMsg;
			echo '</div>';
		endif;
	?>
<?php endif; ?>
<?php
	App::uses('Validation', 'Utility');
	if (!Validation::alphaNumeric('cakephp')):
		echo '<div class="alert alert-warning">';
			echo __d('cake_dev', 'PCRE has not been compiled with Unicode support.');
			echo '<br/>';
			echo __d('cake_dev', 'Recompile PCRE with Unicode support by adding <code>--enable-unicode-properties</code> when configuring');
		echo '</div>';
	endif;
?>

<?php
        if (CakePlugin::loaded('DebugKit')):
                echo '<div class="alert alert-success">';
                        echo __d('cake_dev', 'DebugKit plugin is present');
                echo '</div>';
        else:
                echo '<div class="alert alert-warning">';
                        echo __d('cake_dev', 'DebugKit is not installed. It will help you inspect and debug different aspects of your application.');
                        echo '<br/>';
                        echo __d('cake_dev', 'You can install it from %s', $this->Html->link('GitHub', 'https://github.com/cakephp/debug_kit'));
                echo '</div>';
        endif;
?>
