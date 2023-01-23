<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum</title>
    <link rel="stylesheet" href="../css/style.css" />
    <style>
    .container-fluid {
      height: 66% !important
    }
  </style>
</head>

<body>
    <!-- Lien vers Bootstrap / Connexion BDD / Entete -->
    <?php
    session_start();
    include_once "../controleur/bootstrapCSS.php";
    include_once "../controleur/bddConnect.php";
    include "entete.php";
    ?>
    <!-- Fin lien  -->
    <?php
    // Id de la question
    $idQuestion = $_GET['id'];
    // Savoir si c'est la question ou la réponse à supp
    // Question
    $actionQ = $_GET['q'];
    // Réponse
    $actionR = $_GET['r'];
    // Réponse dans multi reponse
    $actionMR = $_GET['mr'];
    // id réponse dans multi réponse
    $idReponse = $_GET['idR'];

    if ($actionR == 2) {
        mysqli_query($db, "UPDATE Questions SET reponse = '' WHERE id=$idQuestion");
    }
    if ($actionQ == 2) {
        mysqli_query($db, "DELETE FROM Questions WHERE id=$idQuestion");
    }
    if ($actionMR == 2){
        mysqli_query($db, "UPDATE MultiReponse SET reponse = '' WHERE idR=$idReponse");
    }

    ?>
    <div class="container-fluid">
        <div class="col-xl-8 col-xs-12 mx-auto text-center border border-2 border-dark p-3">
            <?php if ($_GET['r'] == 2 || $_GET['mr'] == 2) {
            echo '<p class="lead">La réponse  a bien été supprimée.</p><br>';
            }
            if ($_GET['q'] == 2){
            echo '<p class="lead">La question a bien été supprimée.</p><br>';
            } ?>
            <a href="admin.php?<?= ($_GET['admin'] == "05lrM3") ? "admin=05lrM3" : "" ?>"><input class="btn btn-primary" name="valider" type="submit" value="Retour à l'accueil" /></a>
        </div>
    </div>
    <?php
    include_once "../controleur/bootstrapJS.php" ?>
</body>
<?php include_once "../vue/footer.php"; ?>

</html>