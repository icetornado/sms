<style>
    /*.reveal-modal {
        z-index:200;
    }
    .reveal-modal-bg {
        z-index:100;
    }*/
</style>

<?php
$this->set('title_for_layout', 'SMS Training - Are You Smarter Than Your Boss?'); 
?>

<div class="splashTop" style="height:63px;width:100%;position:relative;z-index:75;text-align:center;">
    <div style="width:135px;margin:0 auto;">
        <div style="position:absolute;bottom:-27px;"><img width="135px" height="55px" src="img/smst_header_quiz@2x.png" alt="" /></div>
    </div>
</div>
<div class="splashBottom" style="background:rgba(51,82,102,0.35);width:100%;position:relative;text-align:center;">
    <div style="padding-top:63px;width:228px;height:291px;position:relative;margin:0 auto;">
        <div style="position:absolute;left:0;top:63;" class="quiz_buttons" url="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 1))) ; ?>">
            <img width="110px" height="110px" src="img/smst_btn_q1@2x.png" alt="" />
        </div>
        <div style="position:absolute;right:0;top:63;" class="quiz_buttons" url="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 2))) ; ?>">
            <img width="110px" height="110px" src="img/smst_btn_q2@2x.png" alt="" />
        </div>
        <div style="position:absolute;left:0;bottom:0;" class="quiz_buttons" url="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 3))) ; ?>">
            <img width="110px" height="110px" src="img/smst_btn_q3@2x.png" alt="" />
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



<script>
    $(document).ready(function(){
        $('.splashBottom').css({'height':($(window).height())-'108'+'px'});
        $(window).resize(function(){
            $('.splashBottom').css({'height':($(window).height())-'108'+'px'});
        });
        
        //setting option of reveal here
        $('#smst-modal').foundation('reveal', {
            //animation: 'fadeAndPop',
            //animationSpeed: 250,
            //closeOnBackgroundClick: false,
            dismissModalClass: 'close_modal_btn',
            //bgClass: 'reveal-modal-bg',
            //open: function(){},
            //opened: function(){},
            close: function(){
            },
            closed: function(){
            }
            //bg : $('.reveal-modal-bg'),
        });
        
        $('#smst-modal').bind('closed', function(){
            window.location.href = $("#close_reveal_button").attr('url');
            
        });
        $(".quiz_buttons").click(function(){
            //console.log($(this).attr('url'));
            $('#smst-modal').html(
                '<h2>Awesome. I have it.</h2>' + 
                '<p class="lead">Your couch.  It is mine.</p>' +
                '<p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>' +
                //'<a class="close-reveal-modal">&#215;</a>' +
                '<div id="close_reveal_button"></div>' + 
                '<input type="button" name="close_modal" value="Close" class="close_modal_btn" id="close_modal_btn" style="margin:4px 0 0 0;" />'
            );
            
            $('#smst-modal').foundation('reveal','open');
            $("#close_reveal_button").attr('url', $(this).attr('url'));
        });
        
        /*
         * 
         */
    });
    
    

</script>