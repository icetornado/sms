<script>
    $(document).ready(function(){
		$('.smst-btn-hof').css({'padding-top':($(window).height())-'449'+'px'});
		$(window).resize(function(){
		  $('.smst-btn-hof').css({'padding-top':($(window).height())-'449'+'px'});
		});
	});
</script>

<div class="smst-top splash">
    <div class="smst-top-sub">
        <div class="smst-top-sub2">
            <img width="194" height="138" data-interchange="[img/smst_header_aystyb.png, (default)], [img/smst_header_aystyb@2x.png, (retina)]" alt="Are You Smarter Than Your Boss?">
        </div>
    </div>
</div>
<div class="smst-bottom">
    <div class="smst-btn-start">
        <a href="<?php echo $this->Html->url(array('controller' => 'quizzes')) ; ?>">
            <img width="94" height="94" data-interchange="[img/smst_btn_start.png, (default)], [img/smst_btn_start@2x.png, (retina)]" alt="Start" />
        </a>
    </div>
    <div class="smst-btn-hof">
        <a href="<?php echo $this->Html->url(array('controller' => 'scoreboards')) ; ?>">
            <img width="120" height="22" data-interchange="[img/smst_btn_boards.png, (default)], [img/smst_btn_boards@2x.png, (retina)]" alt="View Hall of Fame" />
        </a>
    </div>
</div>