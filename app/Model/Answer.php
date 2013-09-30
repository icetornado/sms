<?php

class Answer extends AppModel {
    public $useTable = 'answers';
    public $validate = array(
        'title' => array(
            'required' => true,
            'rule' => 'notEmpty',
            'message' => 'Title required'
        ),
        'body' => array(
            'required' => true,
            'rule' => 'notEmpty',
            'message' => 'Body required',
        ),
        'correct' => array(
            'required' => true,
            'rule' => 'numeric',
            'message' => 'Correct required',
        )
    );
    
    public $belongsTo = array(
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'question_id'
        )
    );
    //public $useTable = 'questions';
}
?>
