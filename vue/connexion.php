<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="search.scss">

</head>

<body>
    <!-- Lien vers Bootstrap / Connexion BDD / Entete -->
    <?php
    session_start();
    include_once "../controleur/bootstrapCSS.php";
    include_once "../controleur/bddConnect.php";
    include "entete.php";
    ?>

    <div class="container">
        <div class="bg-light col-xl-8 col-xs-12 mx-auto text-center border border-2 border-dark p-3 rounded-9 mb-5">
            <p class="h1"> Connexion administrateur : </p><br>
            <div class="col-12 col-sm-10 col-md-4 col-lg-3 mx-auto">
                <form class="form form-group" action="verification.php" method="POST">
                    <input class="form-control text-center" name="utilisateur" type="text" id="utilisateur" value="webmaster" readonly></input>
                    <br><br>
                    <input class="form-control" name="mdp" type="password" id="mdp" placeholder="Mot de passe" require></input>
                    <br><br>
                    <input class="btn btn-primary btn-lg" id="connexionButton" name="connexionButton" type="Submit" value="Me connecter"></input><br>
                    <br>
                </form>
                <?php
                $mdp = $_POST['mdp'];
                $mdp = md5($mdp);
                if (isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if ($err == 1 || $err == 2)
                    echo $_POST['utilisateur'];
                        echo "<p style='color:red'>Mot de passe incorrect</p>";
                }
                ?>
            </div>
        </div>
    </div>




    <!-- Espace de fin -->
    <div class="col-12 mb-5"></div>
    <!-- link bootstrap -->
</body>
<?php
include_once "../vue/footer.php";
include_once "../controleur/bootstrapJS.php" ?>

</html>