<?php
?>
<div id="main_area">
    <div id="quiz_area" style="width:400px; height: 80px; line-height: 20px;border-color: #ccc; border-style:solid;float:left;margin: 5px;text-align:center;">
    <?php
        //if(AuthComponent::user())
        //    echo '<a href="quizzes/index/uid:' . AuthComponent::user('id') .'" alt="SMS Quizzes">Quizzes</a>';
        //    
        //else
        //    echo "Quizzes - Please sign in to access";
       
        echo '<a href="' . $this->Html->url(array('controller' => 'quizzes', 'action' => 'index')) .'" alt="SMS Quizzes">Quizzes</a>';
    ?>
    </div>
    <div id="course_sarea" style="width:400px; height: 80px; line-height: 20px;border-color: #ccc; border-style:solid;float:left;margin: 5px;text-align:center;">
        <a href="<?php echo $this->Html->url(array('controller' => 'courses', 'action' => 'index')); ?>" alt="SMS Courses">Courses</a>
    </div>
    <div id="resources_area" style="width:400px; height: 80px; line-height: 20px;border-color: #ccc; border-style:solid;float:left;margin: 5px;text-align:center;">
        <a href="<?php echo $this->Html->url(array('controller' => 'resources', 'action' => 'index')) ?>" alt="SMS Resources">Resources</a>
    </div>
    
    <div id="resources_area" style="width:400px; height: 80px; line-height: 20px;border-color: #ccc; border-style:solid;float:left;margin: 5px;text-align:center;">
        <a href="<?php echo $this->Html->url(array('controller' => 'scoreboards', 'action' => 'index')) ?>" alt="SMS Hall of Fame">Hall of Fame</a>
    </div>
    
    <div id="admin_area" style="width:400px; height: 80px; line-height: 20px;border-color: #ccc; border-style:solid;float:left;margin: 5px;text-align:center;">
        <?php
        if(AuthComponent::user() && AuthComponent::user('role') == 'admin')
            echo '<a href="' . $this->Html->url(array('controller' => 'administrator', 'action' => 'index')) . '" alt="Admin">Administrator> Admin </a>';
    ?>
    </div>
</div>