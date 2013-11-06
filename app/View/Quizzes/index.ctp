<div class="smst-top quizes">
    <div class="smst-top-sub">
        <div class="smst-top-sub2">
            <img width="135" height="55" data-interchange="[img/smst_header_quiz.png, (default)], [img/smst_header_quiz@2x.png, (retina)]" alt="Select Level" />
        </div>
    </div>
</div>
<div class="smst-bottom">
    <div class="smst-quiz-grid">
        <div class="smst-quiz-item1 quiz_buttons" url="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 1))) ; ?>">
            <img width="110" height="110" data-interchange="[img/smst_btn_q1.png, (default)], [img/smst_btn_q1@2x.png, (retina)]" alt="Level 1 - Basic" />
        </div>
        <div class="smst-quiz-item2 quiz_buttons" url="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 2))) ; ?>">
            <img width="110" height="110" data-interchange="[img/smst_btn_q2.png, (default)], [img/smst_btn_q2@2x.png, (retina)]" alt="Level 2 - Advanced" />
        </div>
        <div class="smst-quiz-item3">
            <img width="110" height="110" data-interchange="[img/smst_btn_q3.png, (default)], [img/smst_btn_q3@2x.png, (retina)]" alt="Coming Soon - Level 3 - Expert" />
        </div>
        <div class="smst-quiz-item4">
            <a href="<?php echo $this->Html->url(array('controller' => 'refresher', 'action' => 'index')) ; ?>">
                <img width="110" height="110" data-interchange="[img/smst_btn_study.png, (default)], [img/smst_btn_study@2x.png, (retina)]" alt="Need Help?" />
            </a>    
        </div>
    </div>
    <div class="smst-btn-hof">
        <a href="<?php echo $this->Html->url(array('controller' => 'scoreboards')) ; ?>">
            <img width="120" height="22" data-interchange="[img/smst_btn_boards.png, (default)], [img/smst_btn_boards@2x.png, (retina)]" alt="View Hall of Fame" />
        </a>
    </div> 
</div>

<script>
    $(document).ready(function(){
        $('.smst-btn-hof').css({'padding-top':($(window).height())-'489'+'px'});
        $(window).resize(function(){
          $('.smst-btn-hof').css({'padding-top':($(window).height())-'489'+'px'});
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
                '<h3>10 questions<br /><span>(quick)</span></h3>' +
                '<h3>7,200 points<br /><span>(impossible)</span></h3>' +
                '<h3>Speed counts<br /><span>(you\'ll see)</span></h3>' +
                '<h3>Wrong answer: 0<br /><span>(oomph)</span></h3>' +
                // '<h3>Be a Hall of Famer</h3>' +
                // '<h3>Brag to your boss</h3>' +
                '<div id="close_reveal_button"></div>' + 
                '<a class="close-reveal-modal">&#215;</a>' +
                '<input type="button" name="close_modal" value="Go" class="close_modal_btn" id="close_modal_btn" />'
            );
            $('#smst-modal').foundation('reveal','open');
            $("#close_reveal_button").attr('url', $(this).attr('url'));
        });

    });
</script>