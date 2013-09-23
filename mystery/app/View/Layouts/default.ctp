<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Sam's Chase!
	</title>
	<?php
		echo $this->Html->css('jquery-ui.css');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-theme');

		echo $this->Html->script('jquery-ui');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('jquery-2.0.3');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Nav bar go here?</h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			Personal Footer!
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
