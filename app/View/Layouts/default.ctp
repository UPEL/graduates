<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->script('prototype');
		echo $this->Html->script('s2');

		echo $this->Html->script('forms');
		echo $this->Html->script('ligtbox');

		echo $this->Html->css(array('chemical','ligtbox'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body style=" background: #003D4C; color: white; font-family: 'lucida grande',verdana,helvetica,arial,sans-serif; font-size: 90%; margin: 0 10px; ">
	<div id="container" style="width: 1160px; margin: 0 auto; ">
		<div id="header"><h2>UPEL</h2></div>
		<div id="content" style="background: white; clear: both; color: #333; overflow: auto; border-top-left-radius: 6px 6px; border-top-right-radius: 6px 6px; border-bottom-left-radius: 6px 6px; border-bottom-right-radius: 6px 6px;">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer"></div>
	</div>
	<?php // echo $this->element('sql_dump'); ?>
</body></html>
