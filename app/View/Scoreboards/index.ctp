
<div class="smst-top hof">
    <div class="smst-top-sub">
        <div class="smst-top-sub2">
            <img width="146" height="55" src="img/smst_header_hof@2x.png" alt="Hall of Fame" />
        </div>
    </div>
</div>

<div class="smst-bottom left">
    <div class="row">
        <div id="tabs" class="smst-hof-tabs">
            <div class="section-container" >
                <div class="level-buttons">
                    <?php foreach($data as $level => $d): ?>
                    <div class="smst-hof-btn-div" level="<?php echo $level; ?>">
                        <a class="smst-hof-btn" href="#<?php echo $level; ?>">Level <?php echo $level; ?></a>
                    </div>
                    <?php endforeach ?>
                </div>
                
                <div class="ranking-content">
                <?php foreach($data as $level => $d): ?>
                    <div class="smst-hof-content" level="<?php echo $level; ?>">
                        <?php if(isset($d['boss'])): ?>
                            <div>Bosses</div>
                            <?php $bosses = $d['boss']; ?>
                            <div class="smst-hof-box">
                            <?php foreach ($bosses as $b): ?>
                                <div class="smst-hof-row bosses">
                                    <div class="icon"></div>
                                    <div class="left"><?php echo $b['firstname'] . " " . $b['lastname']; ?></div>
                                    <div class="right"><?php echo $b['score']; ?></div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                            
                        <?php if(isset($d['score'])): ?>
                            <div>Ranking</div>
                            <?php $sb = $d['score']; ?>
                            <div class="smst-hof-box">
                                <?php $cn = 0; ?>
                                <?php foreach ($sb as $s): ?>
                                    <?php $cn++; ?>
                                    <div class="smst-hof-row">
                                        <div class="left"><?php echo $cn . '. ' . $s['initial']; ?></div>
                                        <div class="right"><?php echo $s['score']; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif;?>
                    </div>
                <?php endforeach; ?>
                </div><!-- end of ranking-content -->
            </div><!-- end of tabs div -->
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    var $level = 1;
    
    toggleButtons();
    toggleContent();
    
    $(".smst-hof-btn-div").click(function(){
        var $divLevel = $(this).attr('level');
        $level = $divLevel;
        toggleButtons();
        toggleContent();
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
});
</script>