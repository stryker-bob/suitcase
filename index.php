<?php 
include 'Player.php';
include 'Hero.php';
include 'Logger.php';

$nameHeroes1=['Daineris','John','Dragon', 'Martin', 'Tirion'];
$nameHeroes2=['Subzero','Scorpion','Raidon', 'Sonia', 'Lu-Kang'];

for($i=0;   $i<5; $i++){

    $heroes1[]= new Hero($nameHeroes1[$i],rand(100,2500),rand(20,170));
    $heroes2[]= new Hero($nameHeroes2[$i],rand(100,2500),rand(20,170));

}

$adilzhan = new Player('Adilzhan',$heroes1);
$ulan = new Player('Ulan',$heroes2);

$json =[
    'p1' => [
        'name' => $adilzhan->name,
        'heroes' => $adilzhan->getHeroesAssArray(),
    ],
    'p2' => [
        'name' => $ulan->name,
        'heroes' => $ulan->getHeroesAssArray(),
    ],

];

print_r($json);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script>
    var players =
    <?php echo json_encode($json);
    ?>
    </script>
    <script src = "/main.js"></script>

</body>
</html>

