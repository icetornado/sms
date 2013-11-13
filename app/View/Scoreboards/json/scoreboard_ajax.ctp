<div id="tabs" class="smst-hof-tabs modal">
    <div id="tabs">
            <div class="section-container" >
                <div class="smst-results-title">
                    <div class="bold">Hall of Fame:</div>
                </div>
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
                            <div class="bold">Bosses</div>
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
                            <div class="bold">Ranking</div>
                            <?php $sb = $d['score']; ?>
                            <div class="smst-hof-box">
                                <?php $cn = 0; ?>
                                <?php foreach ($sb as $s): ?>
                                    <?php $cn ++;?>
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