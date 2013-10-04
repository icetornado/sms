<style>
    a {
        color:#e2eef1;
    }
    a:hover {
        color:#99d538;
    }
    .active a {
        color:#99d538;
    }
</style>

<?php
$this->set('title_for_layout', 'SMS Training - Leaderboards');
?>

<div class="splashTop" style="height:63px;width:100%;position:relative;z-index:75;text-align:center;">
    <div style="width:135px;margin:0 auto;">
        <div style="position:absolute;bottom:-27px;"><img width="146px" height="55px" src="img/smst_header_hof@2x.png" alt="" /></div>
    </div>
</div>

<div class="splashBottom" style="background:rgba(51,82,102,0.35);width:100%;position:relative;">
    <div id="tabs" style="padding:63px 22px 22px 22px;">
        <div class="section-container tabs" data-section="tabs" >
            <?php foreach($data as $level => $d): ?>
                <section class="<?php echo ($requestLevel == $level ? 'active' : '') ?>">
                    <a data-section-title style="text-align:center;font-weight:bold;font-size:18px;text-transform:uppercase;;background:transparent url(img/smst_btn_bg.png) repeat-y scroll center top;width:138px;padding:14px;float:left;" href="#level-<?php echo $level; ?>">Level <?php echo $level; ?></a>
                    <div class="content" data-section-content style="border:none;background:transparent;padding:20px 0;width:100%;">
                        <!-- <p class="title" style="font-weight:bold;font-size:18px;text-transform:uppercase;color:#edf7f9;background:rgba(199,227,242,0.35) url(img/smst_hof_bg.png) repeat-y scroll left top;background-size:50% 1px;width:50%;float:left;padding:14px;"><a href="#level-<?php echo $level; ?>">Level <?php echo $level; ?></a></p> -->
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
                            
                        <?php if(isset($d['score'])): ?>
                            <?php $sb = $d['score']; ?>
                            <div>Ranking</div>
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
                        <?php endif;?>
                    </div><!-- end of content div -->
                </section>
            <?php endforeach; ?>
        </div><!-- end of tabs div -->
    </div>
</div>