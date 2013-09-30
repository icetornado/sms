<?php

?>
<ul>
    <li><a href="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 1))) ; ?>">Level 1 (for toddlers) </a></li>
    <li><a href="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 2))) ; ?>">Level 2 (for juveniles) </a></li>
    <li><a href="<?php echo $this->Html->url(array('controller' => 'quizzes', 'action' => 'quiz', '?' => array('level' => 3))) ; ?>">Level 3 (for ninjas)</a></li>
</ul>