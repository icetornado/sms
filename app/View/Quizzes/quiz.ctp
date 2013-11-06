<?php
echo $this->Html->css('jquery.countdown');
echo $this->Html->script('jquery.countdown.min');
?>

<div id="quiz_content">
    <div class="smst-top quiz">
        <div class="row">
            <div class="smst-quiz-left">
                <div class="smst-quiz-leftSub bold"> 
                    <span class="smst-quiz-dark">QUIZ <?php echo $level; ?></span><br />
                    #<span id="qNum">0</span> of <span id="qTotal"><?php echo count($quizzes); ?></span>
                </div>
            </div>
            <div id="remaining_score" class="smst-quiz-center bold">
                <!-- Score Timer -->
            </div>
            <div class="smst-quiz-right">
                <div class="smst-quiz-rightSub bold">
                    <span id="accu">0</span><br />
                    <span class="smst-quiz-dark">SCORE</span>
                </div>
            </div>
            <div id="remaining_score"></div>
        </div>
    </div>

    <?
    echo '<div class="smst-bottom quiz" ><div class="row">';

    $cn = 0;
    foreach($quizzes as $q)
    {
        echo '<div id="question_' . $cn . ($cn == 0 ? '' : '" style="display:none;"') .'" question_id="' . $q['Quiz']['id']. '">';
        echo '<div id="countdown_' . $cn . '" class="countdown_hide"></div>';

        echo '<div class="smst-quiz-q">'. $q['Quiz']['body'] . '</div>';

        echo '<ul class="smst-quiz-ul">';

        $charCounter = 97;
        foreach($q['Answer'] as $a)
        {
            echo '<li class="block answer_li answer_choices a_'  . $q['Quiz']['id'] . '" question_ord="' . $cn . '" question_id="' . $q['Quiz']['id']. '" correct="' . $a['correct'] . '" answer_val="' . $a['id'] . '">';
            echo '<div class="centered ' . chr($charCounter) . '">' . $a['body'] . '</div>';
            echo '</li>';

            $charCounter ++;
        }

        echo '</ul>';

        echo '<input type="button" name="submit" value="Next" id="select_' . $cn . '" question_ord="' . $cn . '" class="next_btn" disabled="disabled"/>';
        echo '</div>';
        $cn ++;
    }
    echo '</div></div>';
    ?>
</div>
<!-- end of quiz_content -->

<!-- Quiz Finished area -->
<div id="results_display" style="display:none;">
    <div class="smst-top finish">
        <div class="smst-top-sub">
            <div class="smst-top-sub2">
                <img width="159" height="55" data-interchange="[../img/smst_header_lvl<?php echo $level; ?>.png, (default)], [../img/smst_header_lvl<?php echo $level; ?>@2x.png, (retina)]" alt="Level <?php echo $level; ?> Results" />
            </div>
        </div>
    </div>
    <div class="smst-bottom">
        <div id="results_wrapper" class="smst-finished-main">
            <div id="results_success">
                <div id="success_head" class="smst-finished-success"></div>
                <div id="success_text" class="smst-finished-text"></div>
                <div class="smst-finished-btns">
                    <div id="initial_div" style="display:none;">
                        <input type="text" name="initial" value="" placeholder="AAA" maxlength="3" id="initial" class="smst-initials" autocorrect="off" autocapitalize="off" />
                        <input type="button" name="submit_initial" value="Submit" class="others_btn" id="submit_btn" />
                    </div>
                    <input type="button" name="enter_initial" id="enter_btn" value="Enter Initials" class="others_btn" />
                    <input type="button" name="hall_of_fame" id="hall_of_fame" value="Hall of Fame" class="others_btn" />
                    <input type="button" name="brag_button" value="Brag" class="others_btn" id="brag_btn" />
                    <input type="button" name="results_button" value="Results" class="others_btn" id="results_btn" />
                </div>
            </div>
            <div id="results_failed">
                <div id="failed_head" class="smst-finished-fail"></div>
                <div id="failed_text" class="smst-finished-text"></div>
                <div class="smst-finished-btns">
                    <input type="button" name="try_again" id="try_again" value="Try Again" class="others_btn" />
                    <input type="button" name="hall_of_fame" value="Hall of Fame" id="hall_of_fame2" class="others_btn" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of results area -->

<!-- results modal area -->
<div id="results" style="display:none;">
    <a class="close-reveal-modal">&#215;</a>
    <div class="smst-results-title"><span class="bold">Correct:</span> <span id="quiz_correct">xx/xx</span></div>
    <div class="smst-results-title"><span class="bold" >Points:</span> <span id="quiz_score">4500</span></div>
    <div id="quiz_results" class="smst-results-main">

    <?php
        $cn = 0;
        foreach($quizzes as $q)
        {
            echo '<div class="quiz_answers">';
            echo '  <div>' . $q['Quiz']['title'] . ': ' . $q['Quiz']['body'] . '</div>';
            echo '  <div id="answer_correct_'. $cn . '"></div>';
            echo '</div>';
            $cn ++;
        }
     ?>
        <input type="hidden" name="ajaxURL" value="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'save')) . '.json'; ?>" id="ajax_url">
        <input type="hidden" name="scoreURL" value="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'scoreboard')) . '.json'; ?>" id="scoreboard_url">
        <input type="hidden" name="saveURL" value="<?php echo $this->Html->url(array('controller' => 'scoreboards', 'action' => 'scoreboard')). '.json'; ?>" id="save_url">
        <input type="hidden" name="fameURL" value="<?php echo $this->Html->url(array('controller' => 'scoreboards', 'action' => 'scoreboardAjax')). '.json'; ?>" id="fame_url">
    </div>
</div>
<!-- end of area -->

<!-- brag area -->
<div id="brag" style="display:none;">
    <a class="close-reveal-modal">&#215;</a>
    <div class="bragDiv bold">Brag to your Boss(es):</div>
    <?php echo $this->Form->create(null, array('url' => array('controller' => 'quizzes', 'action' => 'brag'), 'id' => 'bragForm')); ?>
    <?php echo $this->Form->input('', array(
        'type' => 'select',
        'multiple' => 'checkbox',
        'options' => $bosses,
        'hiddenField' => false
        )); 
    ?>
    <?php echo $this->Form->input('emailother', array('id' => 'emailother', 'label' => 'Addition Recipients (email):')); ?><br />
    <?php echo $this->Form->input('yourname', array('id' => 'yourname', 'label' => 'Your Name:')); ?><br />
    <?php echo $this->Form->input('score', array('type' => 'hidden', 'id' => 'brag_score', 'value' => '')); ?>
    <?php echo $this->Form->input('level', array('type' => 'hidden', 'id' => 'brag_level', 'value' => $level)); ?>
    <?php echo $this->Form->input('correct', array('type' => 'hidden', 'id' => 'brag_correct', 'value' => '')); ?>
    <?php echo $this->Form->button('Send', array('id' => 'brag_submit')); ?>
    <!--
    <input type="button" name="brag" value="Brag!" id="brag_submit" class="others_btn" style="margin:4px 0 0 0;" />
    <input type="button" name="cancel" value="Cancel" id="brag_cancel" class="others_btn" style="margin:4px 0 0 0;" />
    -->
    <?php echo $this->Form->end(); ?>
</div>
<!-- end of area -->

<!-- hall of fame -->
<div id="scoreboard"></div>
<!-- end of fame -->

<script>
$(document).ready(function () {
    var $maxScore = 620;
    var $currentQuestion = 0;
    var $accumulateScore = 0;
    var $counter = 0;
    var $totalQ = 0;
    var $totalCorrect = 0;
    var $responses = [];
    var $stepdown = 20;
    var $bossmax = [<?php echo implode(',', $bossmax); ?>];
    // console.log($bossmax);
    
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
    
    $('#smst-modal').on('opened', function () {
        $(this).foundation('section', 'reflow');
    });
    
    function isSmarter()
    {
        var $isSmarter = false;
        var $howSmart = 0;
        var $smart = {};
        
        // console.log($bossmax);
        
        for(var $i = 0; $i < $bossmax.length; $i++)
        {
            if($accumulateScore > $bossmax[$i])
            {
                $isSmarter = true;
                $howSmart ++;
            }
        }
        
        $smart.isSmarter = $isSmarter;
        
        if($isSmarter)
            $smart.success = 'Woo-hoo!';
        else
            $smart.success = 'Boo-hoo!';

        switch($howSmart)
        {
            case 0:
                $smart.text = 'Uh, you are not yet smarter than your boss.';
                break;
            
            case 1:
                $smart.text = 'Good job! You&apos;re smarter than a boss.';
                break;
            
            case 2:
            default:
                $smart.text = 'Yeah! You&apos;re smarter than some of your bosses.';
                break;
        }
        
        if($howSmart == $bossmax.length)
            $smart.text = 'Awesome! Your bosses need to know you&apos;re smarter than them. ';
        // console.log($smart);
        return $smart;
    }
    
    function loadQuestion($q)
    {
        if($("#question_" + $q).length > 0)
        {
            var $qNum = parseInt($q) + 1;
            
            $("#qNum").html($qNum);
            $totalQ ++;
            $(".answer_radio").removeAttr('disabled');
            $("#question_" + $q).show();
            $currentQuestion = $q;
            
            //start counter
            $counter = $maxScore;
            $("#countdown_" + $q).countdown({
                until: +20, 
                format: 'S',
                onExpiry: function()
                {
                    var $res = {
                        question_order: $q,
                        question_id: $("#question_" + $q).attr('question_id'),
                        correct: 0,
                        score: 0
                    };
                    $responses.push($res);
                },
                onTick: function()
                {
                    $counter -= $stepdown;
                    $("#remaining_score").html($counter);
                    // console.log('tick: ' + $counter);
                }
            });
        }
        else if($q == 0)
        {
            $("#panel").html("<h4>No quiz</h4>");
        }
        else
        {
            $("#quiz_correct").html($totalCorrect + "/" + $totalQ);
            $("#quiz_score").html($accumulateScore);
            
            var $smartResult = isSmarter();
            if($smartResult.isSmarter)
            {
                
                $("#success_head").html($smartResult.success);
                $("#success_text").html($smartResult.text);
                $("#results_success").show();
                $("#results_failed").hide();
            }
            else
            {
                $("#failed_head").html($smartResult.success);
                $("#failed_text").html($smartResult.text);
                $("#results_success").hide();
                $("#results_failed").show();
            }
            $("#quiz_content").hide();
            
            saveResults($responses);
      
            for($i = 0; $i < $responses.length; $i++)
            {
                var $answerTxt = ($responses[$i].correct == 1 ? 'Correct' : 'Incorrect') + ' - Score: ' + $responses[$i].score;
                $("#answer_correct_" + $i).html($answerTxt);
                $("#answer_correct_" + $i).parent().addClass($responses[$i].correct == 1 ? 'correct' : 'incorrect');
                
            }
            
            $("#brag_score").val($accumulateScore);
            $("#brag_correct").val($totalCorrect + "/" + $totalQ);
            $("#results_display").show();
            $("#quiz_results").show();
        }
    }
    
    function saveResults($rez)
    {
        $.ajax({
            type: "GET",
            url: $("#ajax_url").val(),
            async: false,
            data: {'data': JSON.stringify($rez)},
            dataType: 'html',
            success: function(response){
                // console.log(response);
            }
        });
    }
    
    function scoreboard()
    {
        var $total = $accumulateScore;
        var $initial = $("#initial").val();
        
        $.ajax({
            type: "GET",
            url: $("#scoreboard_url").val(),
            async: false,
            data: {'total': $total, 'initial': $initial, 'level': <?php echo $level; ?>},
            dataType: 'html',
            success: function(response){
                $.ajax({
                    type: "GET",
                    url: $("#save_url").val(),
                    async: false,
                    dataType: 'html',
                    success: function(feedback){
                        //window.location.href = "<?php echo $this->Html->url(array('controller' => 'scoreboards', 'action' => 'index', '?' => array('level' => $level))); ?>";
                    }
                });
            }
        });
    }
    //---- events --------
    $(".answer_li").click(function(){
        var $answer_val = $(this).attr('answer_val');
                
        var $qOrder = $(this).attr('question_ord');
        $("#select_" + $qOrder).removeAttr('disabled');
        
        $("#countdown_" + $qOrder).countdown('destroy');
        // console.log('R/W: ' + $(this).attr('correct'));
        // console.log('counter: ' + $counter);
        // console.log('accu: ' + $accumulateScore);
        
        var $res = {
            question_order: $qOrder,
            question_id: $("#question_" + $qOrder).attr('question_id'),
            correct: 0,
            score: 0
       };
                    
        if($(this).attr('correct') == '1')
        {
            $res.correct = 1;
            $res.score = $counter;
            $accumulateScore += $counter ;
            $("#accu").html($accumulateScore);
            $("#remaining_score").html($counter);
            $("#correct").html('Right');
            $(".a_" + $(this).attr('question_id')).each(function(){
                if(parseInt($(this).attr('correct')) == 1)
                {
                    $(this).children('div').addClass('correct');
                }
                else
                {
                    $(this).children('div').addClass('others');
                }
            });
            
            $totalCorrect ++;
        }
        else
        {
            $res.correct = 0;
            $res.score = 0;
            $("#remaining_score").html(0);
            $("#correct").html('Wrong');
            
            $(".a_" + $(this).attr('question_id')).each(function(){
                if(parseInt($(this).attr('correct')) == 1)
                {
                    $(this).children('div').addClass('correct');
                }
                else
                {
                    $(this).children('div').addClass('others');
                }
            });
            $($(this).children('div')).removeClass('others');
            $($(this).children('div')).addClass('incorrect');
        }
        
        $responses.push($res);
        
        $(this).unbind('click');
        $(this).siblings().unbind('click');
    });

    // Will's Crap Code That Trieu Needs to Make Better

    var centeredHeightA, centeredHeightB, centeredHeightC, centeredHeightD

    function setLineHeight() {
        centeredHeightA = $(".centered.a").height();
        centeredHeightB = $(".centered.b").height();
        centeredHeightC = $(".centered.c").height();
        centeredHeightD = $(".centered.d").height();
        if (centeredHeightA < 31) {$(".centered.a").css('line-height', '27px');}
        else {$(".centered.a").css('line-height', '16px');}
        if (centeredHeightB < 31) {$(".centered.b").css('line-height', '27px');}
        else {$(".centered.b").css('line-height', '16px');}
        if (centeredHeightC < 31) {$(".centered.c").css('line-height', '27px');}
        else {$(".centered.c").css('line-height', '16px');}
        if (centeredHeightD < 31) {$(".centered.d").css('line-height', '27px');}
        else {$(".centered.d").css('line-height', '16px');}
    };

    setLineHeight();

    $(window).resize(setLineHeight);

    //---- end crap code ------
    
    $(".next_btn").click(function(){
        $("#remaining_score").html('');
        var $qOrder = parseInt($(this).attr('question_ord'));

        $("#question_" + $qOrder).remove();
        loadQuestion($qOrder + 1);

        setLineHeight();

        var headerHeight = $(".top-bar").height();
        $('body,html').animate({scrollTop:$('.smst-main').offset().top - headerHeight}, 'fast');
    });
    
    $("#enter_btn").click(function(){
        $(this).hide();
        $("#initial_div").show();
    });
    
    $("#submit_btn").click(function(){
        $("#enter_btn").remove();
        $("#initial_div").hide();
        scoreboard();
    });
        
    $("#brag_btn").click(function(){
        //$("#quiz_results").hide();
        $('#smst-modal').foundation('reveal',{dismissModalClass: 'close-reveal-modal'});
        $('#smst-modal').html($('#brag').html());   
        $('#smst-modal').foundation('reveal','open');
    });
    
    $("#results_btn").click(function(){
        //$("#quiz_results").hide();
        $('#smst-modal').foundation('reveal',{dismissModalClass: 'close-reveal-modal'});
        $('#smst-modal').html($('#results').html());   
        $('#smst-modal').foundation('reveal','open');
    });
    
    /*$("#brag_cancel").click(function(){
        $('#smst-modal').foundation('reveal','close');
    });
    
    $("#brag_submit").click(function(){
        $("#bragForm").submit();
   });*/
    
    $("#hall_of_fame").click(function(){
        $.ajax({
            type: "GET",
            url: "<?php echo $this->Html->url(array('controller' => 'scoreboards', 'action' => 'scoreboard_ajax')) . '.json'; ?>",
            async: false,
            data: {'level': <?php echo $level; ?>},
            dataType: 'html',
            success: function(response){
                $('#smst-modal').html(response + '<a class="close-reveal-modal">×</a>');   
                //$('#smst-modal').css('color', 'black');
                $('#smst-modal').foundation('reveal','open');
            }
        });
    });
    
    $("#hall_of_fame2").click(function(){
        $.ajax({
            type: "GET",
            url: "<?php echo $this->Html->url(array('controller' => 'scoreboards', 'action' => 'scoreboard_ajax')) . '.json'; ?>",
            async: false,
            data: {'level': <?php echo $level; ?>},
            dataType: 'html',
            success: function(response){
                $('#smst-modal').html(response + '<a class="close-reveal-modal">×</a>');  
                //$('#smst-modal').css('color', 'black');
                $('#smst-modal').foundation('reveal','open');
            }
        });
    });
    
    $("#try_again").click(function(){
        window.location.href = "<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'index')); ?>";
    });
    //---- end of events ------
    
    
    // ------ main -----
    loadQuestion(0);

    
});
</script>





