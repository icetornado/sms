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
	<link rel="stylesheet" href="css/foundation.css">
	<style>
		body {
			background:#000000 /*url(img/smst_bg.jpg) no-repeat fixed center top*/;
			color:#ffffff;
			/*padding-top:139px;*/
			font-family: "Segoe WP","HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
    		font-weight: 300;
			}
        p {
           font-weight: 300;     
        }
		h1, h2, h3, h4, h5, h6 {
			color:#ffffff;
			}
		.top-bar {
			background:rgba(51,82,102,0.6);
			margin-bottom:0;
			}
		.top-bar.expanded .title-area, .top-bar-section .dropdown {
			background:rgba(51,82,102,0.6);
			}
		.top-bar .name h1 a {
			background:transparent url(img/smst_logo@2x.png) no-repeat scroll left top;
			background-size:164px 45px;
			text-indent: -9999em;
			width:164px;
			}
		.top-bar-section ul, .top-bar-section li a:not(.button) {
			background:transparent;
			}
		.smst-nav {
			text-align: center;
			}
		.smst-nav ul {
			width:198px;
			margin:14px auto;
			}
		.smst-nav ul li {
			float:left;
			list-style-type: none;
			}
		.smst-nav ul li a {
			float:left;
			width:66px;
			height:66px;
			background:#888888;
			text-indent:-9999em;
			background:transparent url(img/sms_nav_sprite@2x.png) no-repeat scroll left top;
			background-size:198px 132px;
			}
		.smst-nav ul li a:hover.one, .smst-nav ul li a.one.active {
			background-position:left bottom;
			}
		.smst-nav ul li a.two {
			background-position:center top;
			}
		.smst-nav ul li a:hover.two, .smst-nav ul li a.two.active {
			background-position:center bottom;
			}
		.smst-nav ul li a.three {
			background-position:right top;
			}
		.smst-nav ul li a:hover.three, .smst-nav ul li a.three.active {
			background-position:right bottom;
			}
		.smst-cover {
			background:#000000 url(img/smst_bg.jpg) no-repeat fixed center top;
			}
		.smst-cover.sub1 {
			background-position:center -45px;
			}
		.smst-cover.sub2 {
			background-position:center -139px;
			}
		.fixed-test {
			top:0;
			left:0;
			position:fixed;
			z-index:100;
			width:100%;
			}
		.fixed-test2 {
			position:fixed;
			z-index:100;
			left:0;
			top:45px;
			width:100%;
			height:94px;
			}
		.fixed-sub {
			position:fixed;
			z-index:1;
			left:0;
			top:0;
			width:100%;
			height:480px;
			background:#000000 url(img/smst_bg.jpg) no-repeat scroll center top;
			}
		.fixed-sub2 {
			position:fixed;
			z-index:75;
			left:0;
			top:0;
			width:100%;
			height:139px;
			background:#000000 url(img/smst_bg.jpg) no-repeat scroll center top;
			}
		#wheelbox {
			height:150px;
			position:relative;
			overflow:hidden;
			/*background:#cccccc;*/
			}
		#spinBtn {
			background:#aaaaaa;
			position:relative;
			z-index:101;
			width:40px;
			height:40px;
			border-radius:20px;
			line-height:40px;
			text-align:center;
			cursor:pointer;
			}
		.satellite {
			background:transparent url(img/sms_circle_sprite@2x.png) no-repeat scroll center center;
			background-size:330px 110px;
			line-height:110px;
			text-indent:-9999em;
			width:110px;
			height:110px;
			position:absolute;
			}

		#box1 {
			/*background:rgba(199,227,242,0.35);*/
			
			}
		#box2 {
			/*background:rgba(199,227,242,0.35)*/
			background-position:left center;
		}
		#box3 {
			/*background:rgba(199,227,242,0.35)*/
			background-position:right center;
			}
		#box4 {
			background-position:center center;
			}
		#box5 {
			background-position:left center;
			}
		#box6 {
			background-position:right center;
			}
		#panel {
			padding:0 22px 44px 22px;
			font-weight:lighter;
			font-size:1.1em;
			color:#edf7f9;
            background:rgba(51,82,102,0.3);
			}
		.sms-header {
			font-size:19px;
			color:#b0d087;
			}
		.sms-p {
			margin:5px 0 16px 0;
			}
		#swipeDiv{
			line-height: 40px;
			margin-top: 10px;
			margin-bottom: 10px;
			}
		ul, ol {
    		margin-left: 44px;
			}
        .smst-content {
            position:relative;
            z-index:50;
        }
        .smst-menu {
            background:transparent url(img/smst_menu@2x.png) no-repeat scroll right center;
			background-size:46px 45px;
            text-indent: -9999em;
            width:46px;
            height:45px;
        }
	</style>
  	<script src="js/vendor/custom.modernizr.js"></script> 
    
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
					<h1><a href="./">SMS | TRAINING</a></h1>
				</li>
				 <li class="toggle-topbar smst-menu">
					<a href="#"><span>Menu</span></a>
				</li> 
			</ul>
				 <section class="top-bar-section">
				<ul class="right">
					<li class="">
						<a href="#">Quiz</a>
					</li>
					<li class="">
						<a href="#">Course</a>
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


  <script>
    document.write('<script src=' + ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') + '.js><\/script>')
  </script>
  
  <script src="js/foundation.min.js"></script>
  
	<script>
    	$(document).foundation();
	</script>
</body>
</html>
