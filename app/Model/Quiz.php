<?php

class Quiz extends AppModel
{
    public $useTable = 'questions';
    public $hasMany = array(
        'Answer' => array(
            'className' => 'Answer',
            'foreignKey' => 'question_id',
            'order' => array('ord' => 'asc'),
        ),
    );
    
    
}
?>