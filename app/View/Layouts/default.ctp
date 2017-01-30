<!DOCTYPE html>
<html>
<head>
	<?php 
	//echo $this->fetch('css'); echo $this->fetch('script');
	$controller = strtolower($this->params['controller']);
	$action = strtolower($this->params['action']);
	$fname = $this->Session->read('Auth.User.name');
	$urole = $this->Session->read('Auth.User.role');
	?>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $this->fetch('title'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php
		echo $this->Html->css(array('cake.generic.css', 'bootstrap.min.css', 'font-awesome.min.css', 'custom.css','autocss.css','datepicker.css','jquery-ui.css','jquery-ui.structure.css'));
	?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  	
</head>
<body>
<?php echo $this->element('topmenu'); ?>

	<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
			<?php echo $this->element('sidemenu', array('ctl'=>$controller, 'act'=>$action, 'urole'=>$urole)); ?>
			<div class="col-sm-9 col-md-10 main">
			  <!--toggle sidebar button-->
			  <p class="visible-xs">
			    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
			  </p>
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->fetch('content'); ?>
			</div><!--/row-->
		</div>
	</div><!--/.container-->

	<footer>
	  <p class="pull-right">&copy;2015 FTI UK Duta Wacana</p>
	</footer>

		<?php echo $this->Html->script(array('jquery.min.js', 'jquery-ui.js',  'bootstrap.min.js','bootstrap-datepicker.js')); ?>
	<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle=offcanvas]').click(function() {
			$('.row-offcanvas').toggleClass('active');
		});
		if ( $('#flashmessage').text() != '') {
			setTimeout(function() {
				$('#flashmessage').slideUp(400);
			}, 5000);
		};

		<?php echo $this->element('jsuser', array('ctrl'=>$controller, 'act'=>$action, 'urole'=>$urole)); ?>
		<?php echo $this->element('jssetup', array('ctrl'=>$controller, 'act'=>$action, 'urole'=>$urole)); ?>
		<?php echo $this->element('jsxls', array('ctrl'=>$controller, 'act'=>$action, 'urole'=>$urole)); ?>
		<?php echo $this->element('jsimport', array('ctrl'=>$controller, 'act'=>$action, 'urole'=>$urole)); ?>
		<?php echo $this->element('jslaporan', array('ctrl'=>$controller, 'act'=>$action, 'urole'=>$urole)); ?>
		<?php echo $this->element('jsjemaat', array('ctrl'=>$controller, 'act'=>$action, 'urole'=>$urole)); ?>

	});
	</script>
</body>
</html>
