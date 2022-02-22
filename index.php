<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exo complet lecture SQL.</title>
</head>
<body>
<?php
require __DIR__ . '/Classes/Config.php';
require __DIR__ . '/Classes/DBSingleton.php';

$pdo = DBSingleton::PDO();


/*=======================================1=====================================================
$stm = $pdo->prepare("
    SELECT * FROM clients
");

if($stm->execute()){
    foreach ($stm->fetchAll() as $key => $user) {
        echo "<p>";
        foreach ($user as $key => $userInfo) {
            echo "<span>".$key." : ".$userInfo."</span> | ";
        }
        echo "</p>";
    }
}
*/


/*===================================2==============================================
$stm = $pdo->prepare("
    SELECT * FROM genres
");

if($stm->execute()){
    foreach ($stm->fetchAll() as $key => $genre) {
        echo "<p>";
        foreach ($genre as $key => $genreInfo) {
            echo "<span>".$key." : ".$genreInfo."</span> | ";
        }
        echo "</p>";
    }
}
*/

/*=================================3==================================================
$stm = $pdo->prepare("
    SELECT * FROM clients LIMIT 20
");

if($stm->execute()){
    foreach ($stm->fetchAll() as $key => $user) {
        echo "<p>";
        foreach ($user as $key => $userInfo) {
            echo "<span>".$key." : ".$userInfo."</span> | ";
        }
        echo "</p>";
    }
}
*/

/*====================================4================================================
$stm = $pdo->prepare("
    SELECT * FROM clients WHERE card=1
");

if($stm->execute()){
    foreach ($stm->fetchAll() as $key => $user) {
        echo "<p>";
        foreach ($user as $key => $userInfo) {
            echo "<span>".$key." : ".$userInfo."</span> | ";
        }
        echo "</p>";
    }
}
*/

/*===================================5=====================================================
$stm = $pdo->prepare("
    SELECT lastName, firstName FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC
");

if($stm->execute()){
    foreach ($stm->fetchAll() as $key => $user) {
        echo "<p>";
        foreach ($user as $key => $userInfo) {
            echo "<span>".$key." : ".$userInfo."</span> | ";
        }
        echo "</p>";
    }
}
*/

/*==============================================6=================================================
$stm = $pdo->prepare("
    SELECT title, performer, date, startTime FROM shows ORDER BY title ASC
");
if ($stm->execute()) {
    foreach ($stm->fetchAll() as $show) {
        echo "<p>";
        echo $show['title'] . " par " . $show['performer'] . " le " . $show['date'] . " à " . $show['startTime'];
        echo "</p>";
    }
}
*/

$stm = $pdo->prepare("
    SELECT lastName, firstName, birthDate, card, cardNumber FROM clients
");

if($stm->execute()){
    foreach ($stm->fetchAll() as $user) {

        $card = 'Non';
        if ($user['card'] == 1) {
            $card = 'Oui';
        }

        $cardNumber = '';
        if ($user['cardNumber'] !== null) {
            $cardNumber = $user['cardNumber'];
        }
        echo "<div><p>Nom : ". $user['lastName'] ."</p>";
        echo "<p>Prénom : ". $user['firstName'] ."</p>";
        echo "<p>Date de naissance : ". $user['birthDate'] ."</p>";
        echo "<p>Carte de fidélité : ". $card ."</p>";
        echo "<p>numéro de carte : ". $cardNumber ."</p></div>";
    }
}

?>
</body>
</html>
