<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css">
  <title>Formulaire</title>
  <style>
    body {
      background-color: rgb(205, 205, 205) !important;
    }
  </style>
</head>

<body>
  <!-- Include de bootstrap / BDD / entete -->
  <?php
  session_start();
  include_once "../controleur/bootstrapCSS.php";
  include_once "../controleur/bddConnect.php";
  include "entete.php";

  //Récupérer l'id et la question du fichier question.php
  $idURL = $_GET['id'];
  // Récuper le numéro rep dans l'url
  $repLien = $_GET['rep'];
  // Select la question grâce à l'id du lien
  $selectQuestion = mysqli_query($db, "SELECT * FROM Questions WHERE id = $idURL");

  ?>

  <div class="container-fluid">
    <!-- bg correspond au background / mx-auto (margin-auto) / rounded (border-radius) -->
    <div class="bg-light col-xl-8 col-xs-12 mx-auto text-center border border-2 border-dark p-3 rounded-9">
      <!-- Formulaire pour récupérer les informations qui vont être rentrées -->
      <form class="form form-group" action="ajoutReponse.php?rep=<?php echo $repLien ?>&id=<?php echo $idURL; ?>" method="POST">
        <p class="text-dark h3 ">
          <br>
          <?php
          //Afficher la question correspondant à l'id récupérer du fichier question.php
          while ($ligne = mysqli_fetch_array($selectQuestion)) {
            echo $ligne['question'];
          }
          ?>
        </p>
        <br />
        <!-- Module prénom -->
        <div class="form-row">
          <div class="col-12 col-sm-10 col-md-4 col-lg-3">
            <!-- Case prénom -->
            <label>Prénom (Facultatif)</label>
            <input type="text" class="form-control" placeholder="Henry" name="prenom" />
            <!-- Fin case prénom -->
          </div>
        </div>
        <!-- Fin module prénom -->
        <br /><br />
        <!-- Case réponse -->
        <label class="lead">Écrire la réponse ci-dessous</label><label class="text-danger">*</label>
        <div class="col-8 mx-auto">
          <!-- Module réponse / mb-4 (margin-bottom) -->
          <div class="form-outline mb-4">
            <textarea class="form-control" name="textReponse" id="form4Example3" rows="6"></textarea>
            <label class="form-label" for="form4Example3">Message</label>
          </div>
          <!-- Fin module réponse -->
        </div>
        <!-- Fin case réponse -->
        <br /><br>
        <!-- Bouton envoyer / btn (button) -->
        <input class="btn btn-primary btn-lg" name="valider" type="submit" value="Envoyer" />
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
            echo "<br><br><p style='color:red'><i class='fas fa-exclamation-triangle'></i>Veuillez remplir le champ texte";
          }
          // Si il y a du texte alors ...
          else {
            if ($repLien == 1) {
              // Requete pour ajouter une ligne a la base de donné puisqu'il y a déjà une réponse
              $reqInsert = "INSERT INTO MultiReponse (idQ, reponse, prenom, date) VALUES ($idURL,'" . $reponse . "', '" . $prenom . "', now())";
              mysqli_query($db, $reqInsert);
              header('Location: validationReponse.php');
            } else {
              // Modifier la ligne de la question puisqu'il n'y a pas encore de réponse
              $reqAlter = "UPDATE Questions SET reponse =' $reponse', prenom = ' $prenom ', date = now() WHERE id =$idURL;";
              mysqli_query($db, $reqAlter);
              header('Location: validationReponse.php');
            }
          }
        } ?>
      </form>
    </div>
  </div>
  <!-- Espace de fin -->
  <div class="col-12 mb-5"></div>
  <!-- Link Js Bootstrap -->
  <?php include_once "../controleur/bootstrapJS.php" ?>
</body>

</html>