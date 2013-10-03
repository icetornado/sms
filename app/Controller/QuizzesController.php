<?php

class QuizzesController extends AppController
{
    public $components = array(
        'RequestHandler', 
        'Security'
    );
    
    public $uses = array(
        'Quiz',
        //'Question',
        'Answer',
        'Result',
        'Scoreboard',
        'Boss'
    );
    
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Security->unlockedFields = array('score', 'correct');
    }
    
    public function index()
    {
        /*if(isset($this->request->query['level']) && is_numeric($this->request->query['level']))
            return $this->redirect(
                array(
                    'action' => 'level', 
                    $this->request->query['level'],
                    //'level' => $this->request->query['level'],
                    'uid' => AuthComponent::user('id')
               )
            );*/
        
        $this->set('title_for_layout','SMS Quizzes');
    }
    
    public function quiz()
    {
        if(isset($this->request->query['level']) && is_numeric($this->request->query['level']))
        {
            $level = $this->request->query['level'];
            
            $bosses = $this->Boss->find('all');
            
            $bossmax = $this->Boss->find('all', array(
                'conditions' => array('level' => $level),
                'fields' => array('MAX(Boss.score) as maxscore'),
            ));
            
            $bossArr = array();
            
            foreach($bosses as $boss)
            {
                $bossArr[$boss['Boss']['email']] = $boss['Boss']['firstname'] . " " . $boss['Boss']['lastname'];
            }
            
            $this->set('bosses', $bossArr);
            $this->set('bossmax', $bossmax[0][0]['maxscore']);
            $this->set('level', $level);
            $this->set('quizzes', $this->Quiz->findAllByLevel($level));
            $this->set('title_for_layout','SMS Quiz Level ' . $level);
        }
        else
        {
            throw new NotFoundException();
        }
    }
    
    public function save()
    {
        $ok = true;
        
        $data = json_decode($this->request->query['data']);
        $arr = array();
        foreach($data as $d)
        {
            if($d->correct == 1)
            {
                $arr[] = array(
                    'question_id' => $d->question_id,
                );
            }
        }
        
        if (!$this->Result->saveMany($arr)) {
            $ok = false;
        }
        
        if($ok)
            $this->set('message', 'ok');
        else 
            $this->set('message', 'failed to save results');
    }
    
    public function scoreboard()
    {
        $ok = true;
        $this->Scoreboard->create();
        
        $data = array(
            'initial' => $this->request->query['initial'],
            'score' => $this->request->query['total'],
            'level' => $this->request->query['level']
        );
        
        if (!$this->Scoreboard->save($data)) {
            $ok = false;
        }
        
        if($ok)
            $this->set('message', 'ok');
        else 
            $this->set('message', 'failed to save scoreboard');
    }
    
    public function brag()
    {
        /*echo '<pre>';
        print_r($this->request->data);
        print_r(explode(',', $this->request->data['Quiz']['emailother']));
        echo '</pre>';*/
        //exit;
        
        App::uses('CakeEmail', 'Network/Email');
        
        $Email = new CakeEmail();
        $Email->from(array('me@example.com' => 'My Site'));
        $otherMail = explode(',', $this->request->data['Quiz']['emailother']);
        
        if(!is_array($otherMail))
            $otherMail = array();
        
        $subject = 'Beat you - From ' . $this->request->data['Quiz']['yourname'];
        
        $Email->to($this->request->data['Quiz']['email']);
        $Email->subject($subject);
        $body = 'My message is: my score is ' . $this->request->data['Quiz']['score'] . ' at level ' . $this->request->data['Quiz']['level'];
        $Email->send($body);
        
        if(!empty($otherMail))
        {
            foreach($otherMail as $om)
            {
                if(!empty($om))
                {
                    $Email->to($om);
                    $Email->subject($subject);
                    $body = 'My message is: my score is ' . $this->request->data['Quiz']['score'] . ' at level ' . $this->request->data['Quiz']['level'];
                    $Email->send($body);
                }
            }
        }
        
        $this->set('body', $body);
    }
    
    
}
?>
