<?php

echo $this->Html->css('jquery.countdown');
echo $this->Html->script('jquery.countdown.min');
$this->Html->addCrumb('Quizzes', '/quizzes');
//echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');


echo "<h2> Quiz level: " . $level . '</h2>';
echo '<div id="quiz_content">';
echo '<div id="panel">';
echo '<h3 id="remaining_score"></h3>';
echo '<h4>Total score: <span id="accu"></span></h4>';
echo '<h4>Light/Wong?: <span id="correct"></span></h4>';
echo '</div>';

$cn = 0;
foreach($quizzes as $q)
{
    echo '<div id="question_' . $cn . '" style="border-color: #ccc; border-style:solid;margin: 10px 0 0 10px;' . 
          ($cn == 0 ? '' : 'display:none;') .'" question_id="' . $q['Quiz']['id']. '">';
    echo '<div id="countdown_' . $cn . '"></div>';
    
    echo '<p>'. $q['Quiz']['title'] . '&nbsp;&nbsp;&mdash;&nbsp;&nbsp;' . $q['Quiz']['body'] . '</p>';
    
    echo '<ul>';
    foreach($q['Answer'] as $a)
    {
        echo '<li class="answer_choices a_'  . $q['Quiz']['id'] . '">';
        echo '<input type="radio" name="a_' . $q['Quiz']['id'] . '" value="' . $a['id'] . '" class="answer_radio" question_ord="' . $cn . '" question_id="' . $q['Quiz']['id']. '" correct="' . $a['correct'] . '" />';
        echo $a['title'] . '&nbsp;&nbsp;&mdash;&nbsp;&nbsp;' . $a['body'];
        echo '</li>';
    }
    echo '</ul>';
    
    echo '<input type="button" name="submit" value="Next" id="select_' . $cn . '" question_ord="' . $cn . '" class="next_btn" disabled="disabled"/>';
    echo '</div>';
    $cn ++;
}
echo '</div>';
?>
<!-- display score -->
<div id="results_display" style="display: none;">
<h3>Results</h3>
<h4>Correct: <span id="quiz_correct"></span> - Total Score: <span id="quiz_score"></span></h4>
</div>
<!----->

<!-- results area -->
<div id="quiz_results" style="display:none;">
    
<?php
    $cn = 0;
    foreach($quizzes as $q)
    {
        echo '<div class="quiz_answers"><p>'. $q['Quiz']['title'] . '&nbsp;&nbsp;&mdash;&nbsp;&nbsp;' . $q['Quiz']['body'] . '</p>';
        echo '<div id="answer_correct_'. $cn . '"></div>';
        echo '</div>';
        $cn ++;
    }

 ?>
    <div id="initial_div">Enter "Hall of Fame": <input type="text" name="initial" value="AAA" maxlength="3" id="initial" /></div>
    <input type="button" name="enter" value="Enter" id="enter_btn" />
    <input type="button" name="brag" value="Brag" id="brag_btn" />
    <input type="hidden" name="ajaxURL" value="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'save')) . '.json'; ?>" id="ajax_url">
    <input type="hidden" name="scoreURL" value="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'scoreboard')) . '.json'; ?>" id="scoreboard_url">
    <input type="hidden" name="fameURL" value="<?php echo $this->Html->url(array('controller' => 'scoreboards', 'action' => 'scoreboard')) . '.json'; ?>" id="fame_url">
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
    <?php echo $this->Form->end(); ?>
</div>
<!-- end of area -->

<!-- hall of fame -->
<div id="scoreboard"></div>
<!-- end of fame --->
 <script>
$(document).ready(function () {
    var $maxScore = 640;
    var $currentQuestion = 0;
    var $accumulateScore = 0;
    var $counter = 0;
    var $totalQ = 0;
    var $totalCorrect = 0;
    var $responses = [];
    var $stepdown = 40;
    
    function loadQuestion($q)
    {
        if($("#question_" + $q).length > 0)
        {
            $totalQ ++;
            $(".answer_radio").removeAttr('disabled');
            $("#question_" + $q).show();
            $currentQuestion = $q;
            
            //start counter
            $counter = $maxScore;
            $("#countdown_" + $q).countdown({
                until: +9, 
                format: 'S',
                onExpiry: function()
                {
                    //$(this).countdown('destroy');
                    
                    var $res = {
                        question_order: $q,
                        question_id: $("#question_" + $q).attr('question_id'),
                        correct: 0,
                        score: 0
                    };
                    $responses.push($res);
                    
                    //$("#question_" + $q).remove();
                    //loadQuestion($q + 1);
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
            $("#quiz_content").hide();
            
            saveResults($responses);
      
            for($i = 0; $i < $responses.length; $i++)
            {
                var $answerTxt = ($responses[$i].correct == 1 ? 'Correct' : 'Incorrect') + ' - Score: ' + $responses[$i].score;
                $("#answer_correct_" + $i).html($answerTxt);
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
                    url: $("#fame_url").val(),
                    async: false,
                    dataType: 'html',
                    success: function(feedback){
                        console.log(feedback);
                        $("#scoreboard").html(feedback);
                        $("#scoreboard").dialog({
                            close: function(event, ui) {
                                $("#initial_div").remove();
                                $("#enter_btn").remove();
                                $("#brag_btn").remove();
                            }
                        });
                        $("#tabs").tabs({active: parseInt(<?php echo $level; ?>) -1});
                        $("#scoreboard").dialog('open');
                    }
                });
            }
        });
    }
    //---- events --------
    $(".answer_radio").click(function(){
        console.log($(this).val());
        var $qOrder = $(this).attr('question_ord');
        $("#select_" + $qOrder).removeAttr('disabled');
        $(".answer_radio").attr('disabled', 'disabled');
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
            $(this).parent().addClass('correct');
            $totalCorrect ++;
        }
        else
        {
            $res.correct = 0;
            $res.score = 0;
            $("#remaining_score").html(0);
            $("#correct").html('Wrong');
            
            $(this).parent().addClass('incorrect');
            
            $(".a_" + $(this).attr('question_id')).each(function(){
                if(parseInt($(this).children().attr('correct')) == 1)
                {
                    $(this).addClass('correct');
                }
            });
        }
        $responses.push($res);
    });
    
    $(".next_btn").click(function(){
        $("#remaining_score").html('');
        var $qOrder = parseInt($(this).attr('question_ord'));
        //$("#countdown_" + $qOrder).countdown('destroy');
        $("#question_" + $qOrder).remove();
        loadQuestion($qOrder + 1);
    });
    
    $("#enter_btn").click(function(){
        scoreboard();
    });
    
    $("#brag_btn").click(function(){
        $("#quiz_results").hide();
        $("#brag").show();
    });
    //---- end of events ------
    
    // ------ main -----
    loadQuestion(0);
});
</script>