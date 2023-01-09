<?php
// $db = mysqli_connect('localhost', 'root', '', 'vdevbdd',);
$db = mysqli_connect('localhost:8889', 'root', 'root', 'grimonprez',);
if (!$db) {
    echo 'Erreur de connexion à la BDD';
}

?>