<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<?php echo $this->Html->charset(); ?>
        <title>SMS Training - Are You Smarter Than Your Boss?</title>
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
    
    <?php
    $menuItems = array(
        'splash' => array(
            'title' => 'Home',
            'url' => $this->webroot
        ),
        'quizzes' => array(
            'title' => 'Are You Smarter?',
            'url' => $this->Html->url(array('controller' => 'quizzes', 'action' => 'index'))
        ),
        'refresher' => array(
            'title' => 'Refresher',
            'url' => $this->Html->url(array('controller' => 'refresher', 'action' => 'index'))
        ),
    );
    
    $this->start('menubar');
    
    foreach($menuItems as $id => $item)
    {
        if($menuID == $id)
            $className = 'active';
        else
            $className = '';
        
        echo '<li class="'. $className . '">';
        echo '<a href="' . $item['url'] . '">' . $item['title'] . '</a>';
        echo '</li>';
    }
    
    $this->end();
    ?>

                               
    
	<div class="smst-fixed-sub"></div>

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
                                    <?php echo $this->fetch('menubar'); ?>
				</ul>
			</section> 
		</nav>
	</div>

	<div class="smst-main">
        <?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
    <div id="smst-modal" class="reveal-modal"></div>

	<?php echo $this->Html->script("foundation.min"); ?>
	<?php echo $this->Html->script("foundation/foundation.interchange"); ?>
	<script>
    	$(document).foundation();
    	$(document).foundation('interchange', {
			named_queries : {
				retina: 'only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 13/10), only screen and (min-resolution: 120dpi), only screen and (device-height: 80em)'
			}
		});
	</script>

</body>
</html>
