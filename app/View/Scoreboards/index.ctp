<h1>SMS Hall of Fame</h1>
<?php 
echo '<pre>';
print_r($scoreboards);
print_r($bosses);
echo '</pre>';
?>

<?php foreach($scoreboards as $level => $sb): ?>
<h3>Level <?php echo $level; ?></h3>
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
<?php endforeach; ?>
