<?php

// app/Controller/UsersController.php
class ScoreboardsController extends AppController
{
    public $components = array('RequestHandler');
    public $uses = array(
        'Scoreboard',
        'Boss'
    );
    
    public function index()
    {
        $data = $this->getScoreboardData();
        $this->set('data', $data);
    }
    
    public function scoreboard()
    {
        $data = $this->getScoreboardData();
        $this->set('data', $data);
    }
    
    private function getScoreboardData()
    {
        $data = array();
        
        $scoreboard = $this->Scoreboard->find('all', array('order' => array('level', 'score desc')));
        $bosses = $this->Boss->find('all');
        
        foreach($scoreboard as $sc)
        {
            if(!isset($data[$sc['Scoreboard']['level']]))
            {
                $data[$sc['Scoreboard']['level']] = array('score' => array());
            }
            
           $data[$sc['Scoreboard']['level']]['score'][] = $sc['Scoreboard']; 
        }
        
        foreach($bosses as $b)
        {
            if(!isset($data[$b['Boss']['level']]))
            {
                $data[$b['Boss']['level']] = array('boss' => array());
            }
            
            $data[$b['Boss']['level']]['boss'][] = $b['Boss']; 
        }
        
        return $data;
    }
}
?>
