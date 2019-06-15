<?php

class Hero 
{
    private  $name='';
    private  $hp=0;
    private  $damage=0;
    private  $fullHP=0;

    public function __construct($name,$hp,$damage)
    {
        $this->name=$name;
        $this->hp=$this->fullHP=$hp;
        $this->damage=$damage;

    }
    
    public function attack($hero)
    {
       // echo 'Hero' . $this->getInfo($this) . 'attack' . $this->getInfo($hero).'<br>'; 
        $dm=$hero->fixDamage($this->damage);
        Logger::get()->log($this,$hero,$dm);

    }

    public function fixDamage($dm)
    {
        $this->hp-=$dm;
       
    }

    public function getInfo()   
    {

        return $this->getName() . '(' . $this->getDamage().')';

    }

    public function getName()
    {
        return $this->name;
    }

    public function getHP()
    {
        return $this->hp;
    } 
    
    public function getDamage()
    {
        return $this->damage;
    }

    public function startHP()
    {
        return $this->fullHP;
    }
    
    public function setPlayer($player)
    {
        return $this->player=$player;
    }

}