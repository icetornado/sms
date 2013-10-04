<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<?php echo $this->Html->charset(); ?>
	<title>
	<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		//echo $this->Html->css('cake.generic');
        //echo $this->Html->css('jquery-ui.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<?php echo $this->Html->css('foundation'); ?>

    <?php echo $this->Html->css('smst'); ?>
    
  	<?php echo $this->Html->script("vendor/custom.modernizr"); ?>    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

</head>
<body>


	<!-- <div class="fixed-test">test</div> -->

	<div class="fixed-sub"></div>
<!--	<div class="fixed-sub2"></div>-->

	<div class="fixed">
		<nav class="top-bar">
			<ul class="title-area">
				<li class="name">
					<h1><a href="<?php echo $this->webroot; ?>">SMS | TRAINING</a></h1>
				</li>
				 <li class="toggle-topbar smst-menu">
					<a href="#"><span>Menu</span></a>
				</li> 
			</ul>
				 <section class="top-bar-section">
				<ul class="right">
					<li class="">
						<a href="<?php echo $this->webroot; ?>">Home</a>
					</li>
                    <li class="">
						<a href="<?php echo $this->Html->url(array('controller' => 'quizzes')) ; ?>">Are You Smarter?</a>
					</li>
					<li class="">
						<a href="<?php echo $this->Html->url(array('controller' => 'refresher')) ; ?>">Refresher</a>
					</li>
					<li class="">
						<a href="#">Resources</a>
					</li>
				</ul>
			</section> 
		</nav>
	</div>

	<div class="smst-content">
        <?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
        <div id="smst-modal" class="reveal-modal" style="color: black;">
            
        </div>

<!--  <script>
    document.write('<script src=' + ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') + '.js><\/script>')
  </script>-->
  <?php echo $this->Html->script("foundation.min"); ?>
  
  
	<script>
    	$(document).foundation();
	</script>
</body>
</html>
