<style>
    #wheelbox {
        height:150px;
        position:relative;
        overflow:hidden;
        background:rgba(51,82,102,0.3);
        }
    #spinBtn {
        background:#aaaaaa;
        position:relative;
        z-index:101;
        width:40px;
        height:40px;
        border-radius:20px;
        line-height:40px;
        text-align:center;
        cursor:pointer;
        }
    .satellite {
        background:transparent url(img/sms_circle_sprite@2x.png) no-repeat scroll center center;
        background-size:330px 110px;
        line-height:110px;
        text-indent:-9999em;
        width:110px;
        height:110px;
        position:absolute;
        }

    #box1 {
        /*background:rgba(199,227,242,0.35);*/
        
        }
    #box2 {
        /*background:rgba(199,227,242,0.35)*/
        background-position:left center;
    }
    #box3 {
        /*background:rgba(199,227,242,0.35)*/
        background-position:right center;
        }
    #box4 {
        background-position:center center;
        }
    #box5 {
        background-position:left center;
        }
    #box6 {
        background-position:right center;
        }
    #panel {
        padding:22px 0 0 0;
        color:#edf7f9;
        font-weight:300;
        background:none;
        font-size: 1em;
        line-height: 1.2em;
        }
    #swipeDiv{
        line-height: 40px;
        margin-top: 10px;
        margin-bottom: 10px;
        }
</style>

<?php
 
$this->set('title_for_layout', 'SMS Training - Refresher'); 

?>

<div class="splashTop" style="height:63px;width:100%;position:relative;z-index:75;text-align:center;">
    <div style="width:209px;margin:0 auto;">
        <div style="position:absolute;bottom:-28px;"><img width="209px" height="57px" src="img/smst_header_refresh@2x.png" alt="" /></div>
    </div>
</div>
<div class="splashBottom" style="background:rgba(51,82,102,0.35);width:100%;position:relative;padding:0 22px 63px 22px;">
    <div style="padding-top:63px;" class="row">
        <h3>Primer</h3>
        <p>The SMS is a systemic, proactive approach to managing safety risks. It informs organizational structures, accountabilities, policies and procedures.</p>
        <div class="flex-video">
            <iframe style="border:none;" src="//player.vimeo.com/video/76005391?title=0&byline=0&portrait=0&color=eeeeee" width="500" height="281" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        <h3>SMS Principles</h3>
        <div class="large-12" style="position:relative;z-index:50;">
            <div id="wheelbox">
                <!-- <div id="spinBtn">spin</div> -->
                <div id="box1" class="satellite" story="1">Circle 1</div>
                <div id="box2" class="satellite" story="2">Circle 2</div>
                <div id="box3" class="satellite" story="3">Circle 3</div>
                <div id="box4" class="satellite" story="4">Circle 4</div>
                <div id="box5" class="satellite" story="5">Circle 5</div>
                <div id="box6" class="satellite" story="6">Circle 6</div>
                
                <!-- <button class="btn" id="leftBtn" style="position:absolute;top:0;left:20px;">Left</button>
                <button class="btn" id="rightBtn">Right</button> -->
            </div>
    
            <div id="panel"></div>
    
            <div id="story" style="display:none;"> 
                <div id="story1">
                    <!-- <h2>Collect</h2> -->
                    <div class="sms-header">Values</div>
                    <div class="sms-p">Value Employee Safety Contributions</div>

                    <div class="sms-header">Source</div>
                    <div class="sms-p">Reporting/Just Culture</div>

                    <div class="sms-header">How?</div>
                    <div class="sms-p">Employees/Technology, ATSAP, OEDP, TSAP, TARP, PFS, DALR</div>
                </div>
                
                <div id="story2">
                    <!-- <h2>Find</h2> -->
                    <div class="sms-header">Values</div>
                    <div class="sms-p">Improve Technology to Gather and Analyze Data</div>

                    <div class="sms-header">Source</div>
                    <div class="sms-p">Informed Culture</div>

                    <div class="sms-header">How?</div>
                    <div class="sms-p">QA, QC, CEDAR, RAP, Trending</div>
                </div>
                
                <div id="story3">
                    <!-- <h2>Fix</h2> -->
                    <div class="sms-header">Values</div>
                    <div class="sms-p">Embrace Change</div>

                    <div class="sms-header">Source</div>
                    <div class="sms-p">Learning Organization</div>

                    <div class="sms-header">How?</div>
                    <div class="sms-p">Top 5, Corrective Action Requests, Corrective Action Plans, Technical Training</div>
                </div>
                
                <div id="story4">
                    <div class="sms-header">Values</div>
                    <div class="sms-p">Value Employee Safety Contributions</div>

                    <div class="sms-header">Source</div>
                    <div class="sms-p">Reporting/Just Culture</div>

                    <div class="sms-header">How?</div>
                    <div class="sms-p">Employees/Technology, ATSAP, OEDP, TSAP, TARP, PFS, DALR</div>
                </div>
            
                <div id="story5">
                    <div class="sms-header">Values</div>
                    <div class="sms-p">Improve Technology to Gather and Analyze Data</div>

                    <div class="sms-header">Source</div>
                    <div class="sms-p">Informed Culture</div>

                    <div class="sms-header">How?</div>
                    <div class="sms-p">QA, QC, CEDAR, RAP, Trending</div>
                </div>
            
                <div id="story6">
                    <div class="sms-header">Values</div>
                    <div class="sms-p">Embrace Change</div>

                    <div class="sms-header">Source</div>
                    <div class="sms-p">Learning Organization</div>

                    <div class="sms-header">How?</div>
                    <div class="sms-p">Top 5, Corrective Action Requests, Corrective Action Plans, Technical Training</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.touchwipe.1.1.1.js"></script>
<script>
    function deg2rad($a)
    {
        return $a*Math.PI/180.0;
    }

    $(document).ready(function(){
        var $total = $(".satellite").length;
        var $step = 360/$total;
        var $count = 0;
        var $phi = 0;    
        var $radius = 152.5;        //  the distance between center point and satellite
        var $centerID = 'spinBtn';  // id of div of central point 
        
        // var $xRad = $("#wheelbox").width()/2;
        // var $yRad = $("#wheelbox").height()/2;

        var $xRad = $("#wheelbox").width()/2;
        var $yRad = -74;
        
        var $angleArr = [];
        
        floatCircles();     
    
        //click to rotate events
        $('#spinBtn').click(function(){
            buttonClick('left');
        });
        
        $('#leftBtn').click(function(){
            buttonClick('left');
        });
        
        $('#rightBtn').click(function(){
            buttonClick('right');
        });
        
        // swipe event      
        $("#wheelbox").touchwipe({
             wipeLeft: function(){
                buttonClick('left');
             },
             wipeRight: function(){
                buttonClick('right');
             },
             /*wipeUp: function() { alert("up"); },
             wipeDown: function() { alert("down"); },*/
             min_move_x: 20,
             min_move_y: 20,
             preventDefaultEvents: true
        });
        
        //window size change
        /*$(window).resize(function() {
            console.log('<div>Handler for .resize() called.</div>');
            
        });*/
        
        
        function floatCircles()
        {
            $("#spinBtn").css({
                top: $("#wheelbox").height()/2 - $("#spinBtn").height()/2 ,
                left: $("#wheelbox").width()/2 - $("#spinBtn").width()/2
            });
        
            //arranging satellites
            $(".satellite").each(function(){
                $phi = 90 - $step * $count; //starting at 90 degree angle
                $angleArr.push($phi);
                $(this).css({
                    top: $yRad + (Math.sin(deg2rad($phi)) * $radius) - $(this).height()/2,
                    left: $xRad + (Math.cos(deg2rad($phi)) * $radius) - $(this).width()/2
                });
        
                if($count == 0)
                {
                    $("#panel").html($("#story" + $(this).attr('story')).html());
                }   
                $count ++;
            });
        }
        
        function buttonClick(direction)
        {
            var $cn = 0;
            var $story = 0;
            $("#panel").html('');
            $(".satellite").each(function(){
                for($i = 1; $i <= $step + 10; $i+=10)
                {
                    if(direction == 'left')
                    {
                        $(this).animate(
                        {
                            top: $yRad + (Math.sin(deg2rad($angleArr[$cn] + $i)) * $radius) - $(this).height()/2,
                            left: $xRad + (Math.cos(deg2rad($angleArr[$cn] + $i)) * $radius) - $(this).width()/2
                        }, 1, function(){});
                    }
                    else
                    {
                        $(this).animate(
                        {
                            top: $yRad + (Math.sin(deg2rad($angleArr[$cn] - $i)) * $radius) - $(this).height()/2,
                            left: $xRad + (Math.cos(deg2rad($angleArr[$cn] - $i)) * $radius) - $(this).width()/2
                        }, 1, function(){});
                    }
                }
                
                var $angle = 0;
                if(direction == 'left')
                     $angle = $angleArr[$cn] + $step;
                else
                    $angle = $angleArr[$cn] - $step;
                
                $angleArr[$cn] = $angle;
            
                if($angleArr[$cn] % 360 == 90)
                {
                    $story = $(this).attr('story');
                    //console.log('story ' + $story);
                }
            
                /*$(this).animate(
                    {
                        top: $yRad + (Math.sin(deg2rad($angle)) * $radius) - $(this).height()/2,
                        left: $xRad + (Math.cos(deg2rad($angle)) * $radius) - $(this).width()/2
                    }, 500, function(){});*/
                $cn ++;
            });
        
            $("#panel").html($("#story" + $story).html());
            $("#panel").fadeIn('slow');
            
            $(".navItems").removeClass('active');
            $("#nav" + $story).addClass('active');
        }
    });
</script>