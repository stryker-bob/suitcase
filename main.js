

var table=document.createElement('table');
var trPlayer1=document.createElement('tr');
for(hero of players.p1.heroes){
    td = document.createElement('td');
    td.id=players.p1.name+"."+hero.name;
    hero.id=td.id;
    td.innerHTML=hero.name+"("+hero.hp + "," + hero.damage + ")";
    trPlayer1.appendChild(td);
}
table.appendChild(trPlayer1);


var trPlayer2=document.createElement('tr');
for(hero of players.p2.heroes){
    td = document.createElement('td');
    td.id=players.p2.name+"."+hero.name;
    hero.id=td.id;
    td.innerHTML=hero.name+"("+hero.hp + "," + hero.damage + ")";
    trPlayer2.appendChild(td);
}
table.appendChild(trPlayer2);

table.border=1;
document.body.appendChild(table);

var iteration=1;

goodGame();

function goodGame()
{
    if(Math.floor((iteration-1)/25)%2==1){
        playerActive = players.p2;
        playerPassive = players.p1;
    }
    else{
        playerActive = players.p1;
        playerPassive = players.p2;
    }
    
    if(getLiveHeroes(playerActive.heroes).length==0 || getLiveHeroes(playerPassive.heroes).length==0)
    {
        return;
    }
    activeHeroes=playerActive.heroes;
    passiveHeroes= playerPassive.heroes;

    step=iteration%25 == 0 ? 25 : iteration%25;
    heroActive=activeHeroes[Math.floor((step-1)/5)];
    heroPassive = passiveHeroes[(step-1)%5];

    iteration++;

    if(heroActive.hp>0 && heroPassive.hp>0){
        fixDamage(heroActive, heroPassive);
        setTimeout(goodGame,300);
    }
    else{
        goodGame();
    }

}

function getLiveHeroes(heroes)
{
    result=[];
    for(hero of heroes){
        if(hero.hp>0){
            result.push(hero);
        }
    }
    return result;
}

function fixDamage(heroActive, heroPassive)
{
    heroPassive.hp=heroPassive.hp-heroActive.damage;
    tds = document.getElementsByTagName('td');
    for(td of tds){
        if(td.dead !=1){
            td.style="";
        }
    }
    activeTd=document.getElementById(heroActive.id);
    activeTd.style='background-color: green;';

    passiveTd=document.getElementById(heroPassive.id);
    if(heroPassive.hp<0){
        passiveTd.dead=1;
        }
        passiveTd.style = 'background-color: red;';
        passiveTd.innerHTML=heroPassive.name + "("+ heroPassive.hp + "," + heroPassive.damage + ")";
        
}
