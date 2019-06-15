<?php

class Logger 
{
    private static $instance=null;
    private $activity=[];

    public static function get()
    {   
        if(is_null(self::$instance)){
       
            self::$instance=new Logger();
        }
        return self::$instance;
    }

    private function __construct()
    {
        echo 'Test' . '<br>';
    }

    public function log($hero1,$hero2,$damage)
    {
        $this->activity[] = [
            'hero-active'=>$hero1,
            'hero-passive'=>$hero2,
            'hero-active-hp'=>$hero1->getHP(),
            'hero-passive-hp'=>$hero2->getHP(),
            'damage'=>$damage
        ];
            
    }

    public function getActivity()
    {
        return $this->activity;
    }
}