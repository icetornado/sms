<style>
    .countdown_hide {
        display:none;
    }
    .block {
        background:transparent url(../img/smst_answer_bg.png) repeat-x scroll left center;
        list-style-type:none;
        position:relative;
        padding:12px 0;
        margin:0;
        cursor:pointer;
    }
    .block:before {
        content: '';
        display: inline-block;
        height: 100%; 
        vertical-align: middle;
    }
    .centered {
        display: inline-block;
        vertical-align: middle;
        padding: 0 0 0 44px;
        min-height:30px;
        font-weight:16px;
        line-height:16px;
        position:relative;
        left:-22px;
    }
    .centered.a {
        background:transparent url(../img/smst_icon_a@2x.png) no-repeat scroll left center;
        background-size:44px 44px;
    }

    .centered.b {
        background:transparent url(../img/smst_icon_b@2x.png) no-repeat scroll left center;
        background-size:44px 44px;
    }

    .centered.c {
        background:transparent url(../img/smst_icon_c@2x.png) no-repeat scroll left center;
        background-size:44px 44px;
    }

    .centered.d {
        background:transparent url(../img/smst_icon_d@2x.png) no-repeat scroll left center;
        background-size:44px 44px;
    }
    .centered.correct {
        background:transparent url(../img/smst_icon_check@2x.png) no-repeat scroll left center;
        background-size:44px 44px;
        color:#99d538;
    }
    .centered.incorrect {
        background:transparent url(../img/smst_icon_x@2x.png) no-repeat scroll left center;
        background-size:44px 44px;
        color:#ff5c37;
    }
    .centered.others {
        background-image:none;
    }
    .next_btn {
        color:#99d538;
        background:transparent url(../img/smst_btn_bg.png) repeat-y scroll center top;
        padding:10px 22px;
        font-size:1em;
        border:none;
        cursor:pointer;
        margin:22px;
        font-weight:bold;
        border-radius:0;
    }
    .next_btn:disabled {
        cursor:default;
        color:#edf7f9;
    }
    
    .others_btn {
        color:#99d538;
        background:transparent url(../img/smst_btn_bg.png) repeat-y scroll center top;
        padding:10px 22px;
        font-size:1em;
        border:none;
        cursor:pointer;
        margin:22px;
        font-weight:bold;
        border-radius:0;
    }
    .others_btn:disabled {
        cursor:default;
        color:#edf7f9;
    }
    .quiz_answers {
        margin-bottom:22px;
        padding-left:44px;
        min-height:44px;
    }
    .quiz_answers.correct {
        background:transparent url(../img/smst_icon_check@2x.png) no-repeat scroll left center;
        background-size:44px 44px;
        color:#99d538;
    }
    .quiz_answers.incorrect {
        background:transparent url(../img/smst_icon_x@2x.png) no-repeat scroll left center;
        background-size:44px 44px;
        color:#FF5C37;
    }
</style>


<?php
echo $this->Html->css('jquery.countdown');
echo $this->Html->script('jquery.countdown.min');
$this->Html->addCrumb('Quizzes', '/quizzes');
//echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>
<div id="quiz_content">
    <div class="splashTop" style="height:63px;width:100%;position:relative;z-index:75;text-align:center;color:#d6dfe1;">
        <div class="row">
            <div style="float:left;width:30%;text-align:left;height:63px;overflow:hidden;">
                <div style="line-height:14px;font-size:18px;font-weight:bold;padding:16px 0 0 13px;"> 
                    <span style="color:#edf7f9;">QUIZ <?php echo $level; ?></span><br />
                    #<span id="qNum">0</span> of <span id="qTotal"><?php echo count($quizzes); ?></span>
                </div>
            </div>
            <div id="remaining_score" style="float:left;width:40%;text-align:center;font-weight:bold;height:63px;font-size:48px;padding:7px 0 0 0;color:#edf7f9;">
                <!-- Score Timer -->
            </div>
            <div style="float:left;width:30%;text-align:right;height:63px;overflow:hidden;">
                <div style="line-height:14px;font-size:18px;font-weight:bold;padding:16px 13px 0 0;">
                    <span id="accu">0</span><br />
                    <span style="color:#edf7f9;">SCORE</span>
                </div>
            </div>
            <div style="position:absolute;bottom:0;" id="remaining_score"></div>
        </div>
    </div>

<?

echo '<div class="splashBottom" style="background:rgba(51,82,102,0.35);width:100%;position:relative;">';

$cn = 0;
foreach($quizzes as $q)
{
    echo '<div id="question_' . $cn . ($cn == 0 ? '' : '" style="display:none;"') .'" question_id="' . $q['Quiz']['id']. '">';
    echo '<div id="countdown_' . $cn . '" class="countdown_hide"></div>';
    
    echo '<div style="padding:20px 22px;font-size:18px;">'. $q['Quiz']['body'] . '</div>';
    
    echo '<ul style="margin:0;padding:0 22px;">';

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
echo '</div>';
?>
</div>
<!-- end of quiz_content -->

<!-- display score -->
<div id="results_display" style="display:none;" >
    <div class="splashTop" style="height:63px;width:100%;position:relative;z-index:75;text-align:center;">
        <div style="width:159px;margin:0 auto;">
            <div style="position:absolute;bottom:-28px;"><img width="159px" height="55px" src="../img/smst_header_lvl<?php echo $level; ?>@2x.png" alt="" /></div>
        </div>
    </div>
    <div class="splashBottom" style="background:rgba(51,82,102,0.35);width:100%;position:relative;">
        <div id="results_wrapper" style="text-align:center;padding:63px 22px 20px 22px;">
            <div id="results_success">
                <div id="success_head" style="font-weight:bold;font-size:30px;color:#99D538;text-transform:uppercase;margin-bottom:14px;"></div>
                <div id="success_text"></div>
                <div style="margin:18px 0 22px 0;">
                    <input type="button" name="enter_initial" id="enter_btn" value="Enter Initials" class="others_btn" style="margin:4px 0 0 0;" />
                    <input type="button" name="hall_of_fame" id="hall_of_fame" value="Hall of Fame" class="others_btn" style="margin:4px 0 0 0;" />
                    <div id="initial_div" style="display:none;">
                        <input type="text" name="initial" value="AAA" maxlength="3" id="initial" />
                        <input type="button" name="submit_initial" value="Submit" class="others_btn" id="submit_btn" style="margin:4px 0 0 0;" />
                    </div>
                    <input type="button" name="brag_button" value="Brag" class="others_btn" id="brag_btn" style="margin:4px 0 0 0;" />
                </div>
            </div>

            <div id="results_failed">
                <div id="failed_head" style="font-weight:bold;font-size:30px;color:#FF5C37;text-transform:uppercase;margin-bottom:14px;"></div>
                <div id="failed_text"></div>
                <div style="margin:18px 0 32px 0;">
                    <input type="button" name="try_again" id="try_again" value="Try Again" class="others_btn" style="margin:4px 0 0 0;" />
                    <input type="button" name="hall_of_fame" value="Hall of Fame" id="hall_of_fame2" class="others_btn" style="margin:4px 0 0 0;" />
                </div>
            </div>

            <div style="font-size:20px;font-weight:bold;text-align:left;">Correct: <span id="quiz_correct">xx/xx</span></div>
            <div style="font-size:20px;font-weight:bold;text-align:left;">Points: <span id="quiz_score">4500</span></div>
        </div>
        <!----->

        <!-- results area -->
        <div id="quiz_results" style="display:block;padding:0 15px;">

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
</div>
<!-- end of results area -->

<!-- brag area -->
<div id="brag" style="display:none;">
    <p>Show your boss(es) how well you scored: </p>
    <?php echo $this->Form->create(null, array('url' => array('controller' => 'quizzes', 'action' => 'brag'), 'id' => 'bragForm')); ?>
    <?php echo $this->Form->input('email', array(
        'type' => 'select',
        'multiple' => 'checkbox',
        'options' => $bosses,
        'hiddenField' => false
        )); 
    ?>
    <?php echo $this->Form->input('emailother', array('id' => 'emailother', 'label' => 'Mail to Others:')); ?><br />
    <?php echo $this->Form->input('yourname', array('id' => 'yourname')); ?><br />
    <?php echo $this->Form->input('score', array('type' => 'hidden', 'id' => 'brag_score', 'value' => '')); ?>
    <?php echo $this->Form->input('level', array('type' => 'hidden', 'id' => 'brag_level', 'value' => $level)); ?>
    <?php echo $this->Form->input('correct', array('type' => 'hidden', 'id' => 'brag_correct', 'value' => '')); ?>
    <?php echo $this->Form->button('Brag!', array('id' => 'brag_submit')); ?>
    <!--
    <input type="button" name="brag" value="Brag!" id="brag_submit" class="others_btn" style="margin:4px 0 0 0;" />
    <input type="button" name="cancel" value="Cancel" id="brag_cancel" class="others_btn" style="margin:4px 0 0 0;" />
    -->
    <?php echo $this->Form->end(); ?>
</div>
<!-- end of area -->

<!-- hall of fame -->
<div id="scoreboard"></div>
<!-- end of fame --->
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
    console.log($bossmax);
    
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
        
        console.log($bossmax);
        
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
            $smart.success = 'Boo-hoo';

        switch($howSmart)
        {
            case 0:
                $smart.text = 'Uh, you are not yet smarter than your boss.';
                break;
            
            case 1:
                $smart.text = 'Good job! You&apos;are smarter than a boss.';
                break;
            
            case 2:
            default:
                $smart.text = 'Yeah! You&apos;are smarter than some of your bosses.';
                break;
        }
        
        if($howSmart == $bossmax.length)
            $smart.text = 'Awesome! You bosses need to know you are smarter than them. ';
        console.log($smart);
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
                    console.log('tick: ' + $counter);
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
                console.log(response);
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
        console.log('R/W: ' + $(this).attr('correct'));
        console.log('counter: ' + $counter);
        console.log('accu: ' + $accumulateScore);
        
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
    
    $(".next_btn").click(function(){
        $("#remaining_score").html('');
        var $qOrder = parseInt($(this).attr('question_ord'));

        $("#question_" + $qOrder).remove();
        loadQuestion($qOrder + 1);
    });
    
    $("#enter_btn").click(function(){
        $("#initial_div").show();
    });
    
    $("#submit_btn").click(function(){
        $("#enter_btn").remove();
        $("#initial_div").hide();
        scoreboard();
    });
        
    $("#brag_btn").click(function(){
        $("#quiz_results").hide();
               
        $('#smst-modal').html($('#brag').html());   
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
                $('#smst-modal').html(response + '<input type="button" name="close_modal" value="Close" class="close_modal_btn" id="close_modal_btn" style="margin:4px 0 0 0;" />');   
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
                $('#smst-modal').html(response + '<input type="button" name="close_modal" value="Close" class="close_modal_btn" id="close_modal_btn" style="margin:4px 0 0 0;" />');   
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