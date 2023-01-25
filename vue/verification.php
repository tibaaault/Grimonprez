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
    include_once "../../controleur/bootstrapCSS.php";
    include_once "../controleur/bddConnect.php";
    include "entete.php";
    session_start();
    if (isset($_POST['utilisateur']) && isset($_POST['mdp'])) {

        //Get l'email et le mdp
        $email = $_POST['utilisateur'];
        $mdp = $_POST['mdp'];
        $mdpHash = md5($mdp);
        

        if ($email !== "" && $mdp !== "") {
            $req = "SELECT count(*) FROM admin WHERE utilisateur = '" . $email . "' and mdp = '" . $mdpHash . "' ";
            $exec_requete = mysqli_query($db, $req);
            $reponse = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            if ($count != 0) // nom d'utilisateur et mot de passe correctes
            {
                $_SESSION['utilisateur'] = "OKOKOK";
                header('Location: admin.php?admin=05lrM3');
            } else {
                header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
        } else {
            header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
        }
    } else {
        header('Location: connexion.php');
    }
    mysqli_close($db); // fermer la connexion

    ?>

</body>

</html>