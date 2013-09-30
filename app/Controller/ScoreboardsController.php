<?php

// app/Controller/UsersController.php
class ScoreboardsController extends AppController
{
    public $uses = array(
        'Scoreboard',
        'Boss'
    );
    
    public function index()
    {
        
        $data = $this->Scoreboard->find('all', 
            array(
                'order' => array('level', 'score desc'))
            );
        $bosses = $this->Boss->find('all', array('order' => array('lastname', 'firstname')));
        $scoreboards = array();
        foreach($data as $d)
        {
            if(!isset($scoreboards[$d['Scoreboard']['level']]))
                $scoreboards[$d['Scoreboard']['level']] = array();
            
            $scoreboards[$d['Scoreboard']['level']][] = $d['Scoreboard'];
        }
        
        $this->set('scoreboards', $scoreboards);
        $this->set('bosses', $bosses);
                    
    }
}
?>
