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
        echo '<div id="question_' . $cn .  '" ' . ($cn == 0 ? '' : 'style="display:none;"') .' question_id="' . $q['Quiz']['id']. '">';
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
            <div class="smst-results-title"><span class="bold" >Points:</span> <span id="quiz_score_finish"></span></div>
            <div id="results_success">
                <div id="success_head" class="smst-finished-success"></div>
                <div id="success_text" class="smst-finished-text"></div>
                <form class="custom" id="hall_of_fame_form">
                <div class="smst-finished-btns">
                    <div id="initial_div" style="display:none;">
                         <div class="initial-field">
                            <input type="text" name="initial" required pattern="[a-zA-Z]{3}" value="" placeholder="AAA" maxlength="3" id="initial" class="smst-initials" autocorrect="off" autocapitalize="off" />
                         </div>
                        <input type="button" name="submit_initial" value="Submit" class="others_btn" id="submit_btn" />
                    </div>
                    <input type="button" name="enter_initial" id="enter_btn" value="Enter Initials" class="others_btn" />
                    <input type="button" name="hall_of_fame" id="hall_of_fame" value="Hall of Fame" class="others_btn" />
                    <input type="button" name="brag_button" value="Brag" class="others_btn" id="brag_btn" />
                    <input type="button" name="results_button" value="Results" class="others_btn" id="results_btn" />
                </div>
                </form>
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
<div id="brag" style="display:none;"></div>
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
    var $level = <?php echo $level; ?>;
    var $bragCorrect = '';
    
    
    $('#smst-modal').foundation('reveal', {
        //animation: 'fadeAndPop',
        //animationSpeed: 250,
        //closeOnBackgroundClick: false,
        dismissModalClass: 'close_modal_btn',
        //bgClass: 'reveal-modal-bg',
        //open: function(){},
        //opened: function(){},
        //close: function(){
        //},
        //closed: function(){
        //}
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
            $("#quiz_score_finish").html($accumulateScore);
             
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
            
            //$("#brag_score").val($accumulateScore);
            $bragCorrect = $totalCorrect + "/" + $totalQ;
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
        console.log($responses);
    });

    function setLineHeight() {
        var $charArr = ['a', 'b', 'c', 'd'];
        
        for(var $i = 0; $i < $charArr.length; $i++)
        {
            if($(".centered." + $charArr[$i]).height() < 31)
                $(".centered." + $charArr[$i]).css('line-height', '27px');
            else
                $(".centered." + $charArr[$i]).css('line-height', '16px');
        }
    };

    setLineHeight();
    $(window).resize(setLineHeight);
 
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
        var $patt = /[a-zA-Z]{3}/;
        
        if($("#initial").val().match($patt))
        {
            $("#enter_btn").remove();
            $("#initial_div").hide();
            scoreboard();
        }
        else
        {
            $(".initial-field").addClass('error');
        }
    });
    
    $("#brag_btn").click(function(){
        var $bragForm = '<a class="close-reveal-modal">&#215;</a>' +
            '<div class="bragDiv bold">Brag to your Boss(es):</div>' + 
            '<form id="bragForm" action="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'brag')); ?>">' +
            '<div id="boss_emails-field" class="input select">' +
            <?php $cn = 0; ?>
            <?php foreach($bosses as $m => $b): ?>
                '<div class="checkbox">' +
                '<input type="checkbox" name="data[emailboss][]" value="<?php echo $m; ?>" id="boss_<?php echo $cn; ?>" class="boss_checkboxes" >' +
                '<label for="boss_<?php echo $cn; ?>"><?php echo $b; ?></label>' +
                '</div>' + 
            <?php endforeach; ?>
            '</div>' +
            '<div id="emailother-field">' +
            '<label for="emailother">Addition Recipients (email):</label>' +
            '<input class="textBox" type="email" id="emailother" name="data[emailother]" placeholder="your_email@faa.gov" />' +
            '</div>' +
            '<div id="yourname-field">' +
            '<label for="yourname">Your name:</label>' +
            '<input class="textBox" type="text" id="yourname" placeholder="Name" name="data[yourname]" required />' +
            '</div>' +
            '<input type="button" name="send_brag" value="Send" id="brag_something" class="next_btn" />' +
            '<input type="hidden" name="data[score]" id="brag_score" value="' + $accumulateScore + '">' + 
            '<input type="hidden" name="data[level]" id="brag_level" value="' + $level + '">' +
            '<input type="hidden" name="data[correct]" id="brag_correct" value="' + $bragCorrect  +'">' + 
            '</form>';
        
        $('#smst-modal').html($bragForm);
        $('#smst-modal').foundation('reveal','open');
        $("#brag_something").bind('click', function(){
            var $boss_mail = [];
            var $errors = [];
            $(".boss_checkboxes").each(function(){
                if($(this).is(':checked'))
                    $boss_mail.push($(this).val());
            });
    
            if($boss_mail.length == 0)
            {
                $("#boss_emails-field").addClass("error");
                $errors.push(1);
            }
            else
            {
                $("#boss_emails-field").removeClass("error");
            }   
            
            var $emailPatt = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
            
            if($("#emailother").val().length != 0)
            {
                if(!$("#emailother").val().match($emailPatt))
                {    
                    $("#emailother-field").addClass('error');
                    $errors.push(1);
                }
                else
                {
                    $("#boss_emails-field").addClass("error");
                }
            }
            
            var $alphaPatt = /[a-zA-Z]+/;
            if(!$("#yourname").val().match($alphaPatt))
            {    
                $("#yourname-field").addClass('error');
                $errors.push(1);
            }
            else
            {
                $("#yourname-field").addClass("error");
            }
            
            console.log($errors);
            if($errors.length == 0)
                $("#bragForm").submit();
        });
    });
    
    $("#results_btn").click(function(){
        $('#smst-modal').foundation('reveal',{dismissModalClass: 'close-reveal-modal'});
        $('#smst-modal').html($('#results').html());   
        $('#smst-modal').foundation('reveal','open');
    });
    
    function toggleButtons()
    {
        $(".smst-hof-btn-div").each(function(){
            if($(this).attr('level') == $level)
                $(this).addClass('active');
            else
                $(this).removeClass('active');
        });
    }
    
    function toggleContent()
    {
        $(".smst-hof-content").each(function(){
            if($(this).attr('level') == $level)
                $(this).show();
            else
                $(this).hide();
        });
    }
    
    function bindHoFBtns()
    {
        $(".smst-hof-btn-div").bind('click', function(){
            var $divLevel = $(this).attr('level');
            $level = $divLevel;
            toggleButtons();
            toggleContent();
        });
    }
    
    $("#hall_of_fame").click(function(){
        $.ajax({
            type: "GET",
            url: "<?php echo $this->Html->url(array('controller' => 'scoreboards', 'action' => 'scoreboard_ajax')) . '.json'; ?>",
            async: false,
            data: {'level': <?php echo $level; ?>},
            dataType: 'html',
            success: function(response){
                $('#smst-modal').html(response + '<a class="close-reveal-modal">×</a>');   
                $('#smst-modal').foundation('reveal','open');
                
                bindHoFBtns();
                toggleButtons();
                toggleContent();
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
                $('#smst-modal').foundation('reveal','open');
                
                bindHoFBtns();
                toggleButtons();
                toggleContent();
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





