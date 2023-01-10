<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulaire</title>
  </head>
  <body>
    <?php
session_start();
include_once "../controleur/bootstrapCSS.php";
include_once "../controleur/bddConnect.php";
include "entete.php";

//Récupérer l'id et la question du fichier question.php
$idURL = $_GET['id'];
// Récuper le numéro rep dans l'url
$repLien = $_GET['rep'];
// Recuperer la question grâce à l'id de l'url
$ligneQuestion = "SELECT question FROM Questions WHERE id= '$idURL'";
$reqQuestion = mysqli_query($db, $ligneQuestion);
$reqQuestion = mysqli_fetch_assoc($reqQuestion);
?>

    <div class="container-fluid">
      <div class="col-xl-8 col-xs-12 mx-auto text-center border border-2 border-dark p-3">
        <!-- Formulaire pour récupérer les informations qui vont être rentrées -->
        <form class="form form-group" action="formulaireAjout.php?rep=<?php echo $repLien ?>&id=<?php echo $idURL; ?>" method="POST">
          <p class="text-dark h3 ">
            <br>
          <?php
//Afficher la question dans le fichier question.php
print_r($reqQuestion);
echo $reponse;
?>
          </p>
          <br />
          <div class="form-row">
            <div class="col-12 col-sm-10 col-md-4 col-lg-3">
              <!-- Case prénom -->
              <label>Prénom (Facultatif)</label>
              <input
                type="text"
                class="form-control"
                placeholder="Henry"
                name="prenom"
              />
              <!-- Fin case prénom -->
            </div>
          </div>
          <br /><br />
          <!-- Case réponse -->
          <label class="lead">Écrire la réponse ci-dessous. </label><label class="text-danger"> *</label>
          <div class="col-8 mx-auto">
            <div class="form-outline mb-4">
            <textarea class="form-control" name="textReponse" id="form4Example3" rows="6"></textarea>
            <label class="form-label" for="form4Example3">Message</label>
          </div>
          </div>
          <!-- Fin case réponse -->
          <br /><br>
          <!-- Bouton envoyer -->
          <input
            class="btn btn-primary"
            name="valider"
            type="submit"
            value="Envoyer"
          />
          <!-- Fin bouton envoyer -->
          <?php

// récupérer la réponse écrite
$reponse = $_POST['textReponse'];
// Ignorer les '
$reponse = addslashes($reponse);
// récupérer le prénom
$prenom = $_POST['prenom'];

// Quand le bouton est préssé
if (isset($_POST['valider']) and $_POST['valider'] == 'Envoyer') {
    // Vérifier si il y a du texte dans la case réponse, si non, alors afficher Veuillez ...
    if (empty($_POST['textReponse'])) {
        echo "<br><br><p style='color:red'>Veuillez remplir le champ texte";}
    // Si il y a du texte alors ...
    else {
        if ($repLien == 1) {
            // Requete pour ajouter une ligne a la base de donné puisqu'il y a déjà une réponse
            $reqInsert = "INSERT INTO MultiReponse (idQ, reponse, prenom) VALUES ($idURL,'" . $reponse . "', '" . $prenom . "')";
            mysqli_query($db, $reqInsert);
            header('Location: validationReponse.php');
        } else {
            // Modifier la ligne de la question puisqu'il n'y a pas encore de réponse
            $reqAlter = "UPDATE Questions SET reponse=' $reponse ' WHERE id =$idURL;";
            mysqli_query($db, $reqAlter);
            header('Location: validationReponse.php');
        }
    }
}?>
        </form>
      </div>
    </div>
    <?php include_once "../controleur/bootstrapJS.php"?>
  </body>
</html>
