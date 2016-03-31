<?php 
use Cake\Core\Configure;

$this->prepend('meta', $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']));
$this->prepend('css', $this->Html->css(['bootstrap/bootstrap', 'custom'])); 
$this->prepend('script', $this->Html->script(['jquery/jquery', 'bootstrap/bootstrap']));

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $this->fetch('title') ?></title>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

		<!-- Fixed navbar -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
<!-- 					<a class="navbar-brand" href="http://oceanobservatories.org"><img alt="Brand" src="logo.png"></a> -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
          <a class="navbar-brand" href="/"><?= Configure::read('App.title') ?></a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="/designators">Arrays</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<div class="container">
      <?php 
        if (isset($this->Flash))
          echo $this->Flash->render(); ?>
 
          <?= $this->fetch('content') ?>

			<hr>

			<footer>
			  <?php printf('&copy;%s %s', date('Y'), Configure::read('App.title')); ?>
			</footer>

		</div> <!-- /container -->

    <?php echo $this->fetch('script'); ?>

	</body>
</html>





