<?php
$this->set('title_for_layout', 'SMS Training - Leaderboards'); 
?>

<div class="splashTop" style="height:63px;width:100%;position:relative;z-index:75;text-align:center;">
    <div style="width:135px;margin:0 auto;">
        <div style="position:absolute;bottom:-27px;"><img width="146px" height="55px" src="img/smst_header_hof@2x.png" alt="" /></div>
    </div>
</div>

<div class="splashBottom" style="background:rgba(51,82,102,0.35);width:100%;position:relative;">
    <div id="tabs" class="section-container auto" data-section style="padding:63px 22px 22px 22px;">
        <?php foreach($data as $level => $d): ?>
            <section>
                <p class="title" data-section-title><a style="font-weight:bold;font-size:18px;text-transform:uppercase;color:#edf7f9;background:rgba(199,227,242,0.35) url(img/smst_hof_bg.png) repeat-y scroll left top;background-size:50% 1px;width:50%;float:left;padding:14px;" href="#level-<?php echo $level; ?>">Level <?php echo $level; ?></a></p>
                <div class="content" data-section-content>
                    <p class="title" style="font-weight:bold;font-size:18px;text-transform:uppercase;color:#edf7f9;background:rgba(199,227,242,0.35) url(img/smst_hof_bg.png) repeat-y scroll left top;background-size:50% 1px;width:50%;float:left;padding:14px;"><a href="#level-<?php echo $level; ?>">Level <?php echo $level; ?></a></p>
                    <?php if(isset($d['boss'])): ?>
                        <div>Bosses</div>
                        <?php $bosses = $d['boss']; ?>
                        <table>
                            <tbody>
                                <?php foreach ($bosses as $b): ?>
                                <tr>
                                    <td><?php echo $b['firstname'] . " " . $b['lastname']; ?></td>
                                    <td><?php echo $b['score']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php $sb = $d['score']; ?>
                    <h3>Ranking</h3>
                    <table>
                        <thead>
                            <th>Alias</th>
                            <th>Score</th>
                        </thead>
                        <tbody>
                            <?php foreach ($sb as $s): ?>
                            <tr>
                                <td><?php echo $s['initial']; ?></td>
                                <td><?php echo $s['score']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div><!-- end of content div -->
            </section>
        <?php endforeach; ?>
    </div><!-- end of tabs div -->
</div>
