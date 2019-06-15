<?php
class Player 
{
    public $name='';
    public $heroes=[];
    
    public function __construct($name , $heroes)
    {
        $this->name=$name;
        $this->heroes=$heroes;
        foreach($this->heroes as $hero){
            $hero->setPlayer($this);
        }
    }

    public function turn($player)
    {   
        $heroes = $this-> getLiveHeroes();

        if(count($heroes)==0){
            return $player;
    }

       // echo 'Ход=> ' . $this->name . "<br>";
        foreach($heroes as $hero)
        { 
            $enemyHeroes = $player->getLiveHeroes();

            if(count($enemyHeroes)==0){
            
                return $this;
            }

            foreach($enemyHeroes as $enemyHero)
            {
                $hero->attack($enemyHero);
            }
        }

        //echo '<hr>';
        return null;


    }

    public function getLiveHeroes()
    {
        $count=[];
        foreach($this->heroes as $hero){
            if($hero->getHP()>0){
                $count[]=$hero;
            }
        }
        return $count;
    }




    public function getHeroesAssArray()
    {
        $return =[];
        foreach ($this->heroes as $hero){
            $return[]=[
                'name'=>$hero->getName(),
                'damage'=>$hero->getDamage(),
                'hp'=>$hero->getHP(),
            ];
        }
        return $return;
    }
    
}