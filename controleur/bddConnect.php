<?php
// $db = mysqli_connect('localhost', 'root', '', 'vdevbdd',);
$db = mysqli_connect('localhost:8889', 'root', 'root', 'grimonprez');
if (!$db) {
    echo 'Erreur de connexion à la BDD';
}

//Se connecter avec PDO
date_default_timezone_get('Europe/Paris');
try {
$bdd1 = new PDO ("mysql:host=localhost:8889;dbname=grimonprez", "root", "root");
}
catch(Exception $e){
    die('Erreur : '. $e->getMessage());
}
?>