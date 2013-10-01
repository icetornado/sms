<?php

$this->set('title_for_layout', 'SMS Training - Are You Smarter Than Your Boss?'); 

?>

<script>
    $(document).ready(function(){
		$('.splashBottom').css({'height':($(window).height())-'108'+'px'});
		$(window).resize(function(){
		$('.splashBottom').css({'height':($(window).height())-'108'+'px'});
		});
	});
</script>

<?php ?>

<div class="splashTop" style="height:63px;width:100%;position:relative;z-index:75;text-align:center;">
    <div style="width:135px;margin:0 auto;">
        <div style="position:absolute;bottom:-27px;"><img width="135px" height="55px" src="img/smst_header_quiz@2x.png" alt="" /></div>
    </div>
</div>
<div class="splashBottom" style="background:rgba(51,82,102,0.35);width:100%;position:relative;text-align:center;">
    <div style="padding-top:63px;width:228px;height:291px;position:relative;margin:0 auto;">
        <div style="position:absolute;left:0;top:63;">
            <a href="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 1))) ; ?>">
                <img width="110px" height="110px" src="img/smst_btn_q1@2x.png" alt="" />
            </a>
        </div>
        <div style="position:absolute;right:0;top:63;">
            <a href="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 2))) ; ?>">
                <img width="110px" height="110px" src="img/smst_btn_q2@2x.png" alt="" />
            </a>    
        </div>
        <div style="position:absolute;left:0;bottom:0;">
            <a href="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 3))) ; ?>">
                <img width="110px" height="110px" src="img/smst_btn_q3@2x.png" alt="" />
            </a>    
        </div>
        <div style="position:absolute;right:0;bottom:0;">
            <a href="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 3))) ; ?>">
                <img width="110px" height="110px" src="img/smst_btn_study@2x.png" alt="" />
            </a>    
        </div>
    </div>
</div>

<div style="position:fixed;z-index:51;left:0;bottom:0;width:100%;text-align:center;">
    <a href="<?php echo $this->Html->url(array('controller' => 'scoreboards')) ; ?>"><img width="120px" height="22px" src="img/smst_btn_boards@2x.png" alt="" /></a>
</div>