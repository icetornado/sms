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
        if(isset($this->request->query['level']) && is_numeric($this->request->query['level']))
            $level = $this->request->query['level'];
        else
            $level = 1;
        
        $data = $this->getScoreboardData();
        $this->set('requestLevel', $level);
        $this->set('data', $data);
    }
    
    public function scoreboard()
    {
        $data = $this->getScoreboardData();
        
        $this->set('data', $data);
    }
    
    public function scoreboard_ajax()
    {
        if(isset($this->request->query['level']) && is_numeric($this->request->query['level']))
            $level = $this->request->query['level'];
        else
            $level = 1;
        
        $data = $this->getScoreboardData();
        $this->set('requestLevel', $level);
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
