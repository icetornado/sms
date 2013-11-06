
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
            <div class="section-container tabs" data-section="tabs">
                <?php foreach($data as $level => $d): ?>
                    <section class="<?php echo ($requestLevel == $level ? 'active' : '') ?>">
                        <!-- <a data-section-title class="smst-hof-btn" href="#level-<?php echo $level; ?>">Level <?php echo $level; ?></a> -->
                        <div class="content smst-hof-content" data-section-content>
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
                                    <?php foreach ($sb as $s): ?>
                                        <div class="smst-hof-row">
                                            <div class="left"><?php echo $s['initial']; ?></div>
                                            <div class="right"><?php echo $s['score']; ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif;?>
                        </div><!-- end of content div -->
                    </section>
                <?php endforeach; ?>
            </div><!-- end of tabs div -->
        </div>
    </div>
</div>