<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <?php
session_start();
include_once "../controleur/bootstrapCSS.php";
include_once "../controleur/bddConnect.php";
include "entete.php";

//Récupérer l'id et la question du fichier question.php
$unId = $_SESSION['id'];
$laQuestion = $_SESSION['laQuestion'];
?>
    <div class="container-fluid">
      <div class="col-xl-8 col-xs-12 mx-auto text-center border border-2 border-dark p-3">
        <!-- Formulaire pour récupérer les informations qui vont être rentrées -->
        <form class="form form-group" action="formulaireAjout.php" method="POST">
          <p class="text-dark h3 ">
            <br>
          <?php
//Afficher la question dans le fichier question.php
echo $laQuestion;
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
          <label class="lead">Écrire la réponse si dessous. </label><label class="text-danger"> *</label>
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
        if ($resultat['reponse']) {
            // Requete pour ajouter une ligne a la base de donné puiqu'il y a déjà une réponse
            $reqInsert = "INSERT INTO Questions (id, question, reponse, prenom) VALUES ($unId, '" . $laQuestion . "' , '" . $reponse . "', '" . $prenom . "')";
            mysqli_query($db, $reqInsert);
            echo $reqInsert;
        } else {
            // Modifier la ligne de la question puisqu'il n'y a pas encore de réponse
            $reqAlter = "UPDATE Questions SET reponse=' $reponse ' WHERE id =$unId;";
            mysqli_query($db, $reqAlter);
            echo $reqAlter;
        }
    }
}?>
        </form>
      </div>
    </div>
    <?php include_once "../controleur/bootstrapJS.php"?>
  </body>
</html>
