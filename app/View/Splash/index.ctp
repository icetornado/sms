<script>
    $(document).ready(function(){
		$('.splashBottom').css({'height':($(window).height())-'158'+'px'});
		$(window).resize(function(){
		$('.splashBottom').css({'height':($(window).height())-'158'+'px'});
		});
	});
</script>

<?php

?>

<div class="splashTop" style="height:113px;width:100%;position:relative;z-index:75;text-align:center;">
    <div style="width:194px;margin:0 auto;">
        <div style="position:absolute;bottom:-72px;"><img width="194px" height="138px" src="img/smst_header_aystyb@2x.png" alt="" /></div>
    </div>
</div>
<div class="splashBottom" style="background:rgba(51,82,102,0.35);width:100%;position:relative;text-align:center;">
    <div style="padding-top:107px;">
        <a href="<?php echo $this->Html->url(array('controller' => 'quizzes')) ; ?>"><img width="94px" height="94px" src="img/smst_btn_start@2x.png" alt="" /></a>
    </div>
<!--    <div style="width:100%;text-align:center;margin-top:100px;">
        <img width="120px" height="22px" src="img/smst_btn_boards@2x.png" alt="" />
    </div>-->
</div>

<div style="position:fixed;z-index:51;left:0;bottom:0;width:100%;text-align:center;">
    <img width="120px" height="22px" src="img/smst_btn_boards@2x.png" alt="" />
</div>