<?php

$this->set('title_for_layout', 'SMS Training - Are You Smarter Than Your Boss?'); 

?>

<script>
    $(document).ready(function(){
		$('.smst-btn-hof').css({'padding-top':($(window).height())-'415'+'px'});
		$(window).resize(function(){
		  $('.smst-btn-hof').css({'padding-top':($(window).height())-'415'+'px'});
		});
	});
</script>

<div class="smst-top splash">
    <div class="smst-top-sub">
        <div class="smst-top-sub2">
            <img width="194px" height="138px" src="img/smst_header_aystyb@2x.png" alt="Are You Smarter Than Your Boss?" />
        </div>
    </div>
</div>
<div class="smst-bottom">
    <div class="smst-btn-start">
        <a href="<?php echo $this->Html->url(array('controller' => 'quizzes')) ; ?>"><img width="94px" height="94px" src="img/smst_btn_start@2x.png" alt="" /></a>
    </div>
    <div class="smst-btn-hof">
        <a href="<?php echo $this->Html->url(array('controller' => 'scoreboards')) ; ?>">
            <img width="120px" height="22px" src="img/smst_btn_boards@2x.png" alt="View Hall of Fame" />
        </a>
    </div>
</div>