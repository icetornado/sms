<div id="tabs">
    <ul>
        <?php foreach($data as $level => $d): ?>
            <li><a href="#level-<?php echo $level; ?>">Level <?php echo $level; ?></a></li>
        <?php endforeach; ?>
    </ul>
    
    <?php foreach($data as $level => $d): ?>
        <div id="level-<?php echo $level; ?>">
            <h2>Level <?php echo $level; ?></h2>

            <?php if(isset($d['boss'])): ?>
            <h3>Bosses</h3>
            <?php $bosses = $d['boss']; ?>
            <table>
                <thead>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </thead>
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
        </div> <!-- end of div tab -->
    <?php endforeach; ?>
</div> <!-- end of div tabs -->

