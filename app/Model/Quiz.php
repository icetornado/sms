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
    
    public function findRandomByLevel($level)
    {
        $quizBank = $this->findAllByLevel($level);
        
        $randomArr = array();
        
        while(count($randomArr) < 10)
        {
            $randVar = rand(0, count($quizBank) - 1);
            
            if(!in_array($randVar, $randomArr))
                $randomArr[] = $randVar;
        }
        
        $quizQuestions = array();
        
        foreach($randomArr as $k => $v)
            $quizQuestions[] = $quizBank[$v];
        
        return $quizQuestions;
    }
    
}
?>