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

  //Récupérer l'id et la question du fichier listeQuestion.php
  $idURL = $_GET['id'];
  // Récuper le numéro rep dans l'url
  $repLien = $_GET['rep'];
  // Select la question grâce à l'id du lien
  $selectQuestion = mysqli_query($db, "SELECT * FROM Questions WHERE id = $idURL");

  ?>
  <br>
  <div class="container-fluid">
    <!-- bg correspond au background / mx-auto (margin-auto) / rounded (border-radius) -->
    <div class="bg-light col-xl-8 col-xs-12 mx-auto text-center border border-2 border-dark p-3 rounded-9">
      <!-- Formulaire pour récupérer les informations qui vont être rentrées -->
      <form class="form form-group" action="ajoutQuestion.php" method="POST">
        <p class="text-dark h3 ">
          <?php
          //Afficher la question correspondant à l'id récupérer du fichier listeQuestion.php
          while ($ligne = mysqli_fetch_array($selectQuestion)) {
            echo $ligne['question'];
          }
          ?>
        </p>
        <!-- Case question -->
        <label class="lead">Écrire la question ci-dessous </label><label class="text-danger">*</label><br><br>
        <div class="col-xl-8 col-xs-12 mx-auto">
          <div class="form-outline mb-4">
            <textarea class="form-control" name="question" id="form4Example3" rows="3"></textarea>
            <label class="form-label" for="form4Example3">Question</label>
          </div>
        </div>
        <!-- Fin case réponse -->

        <!-- Bouton envoyer / btn (button) -->
        <input class="btn btn-primary btn-lg" name="valider" type="submit" value="Envoyer" />
        <!-- Fin bouton envoyer -->
        <?php

        // récupérer la question écrite
        $question = $_POST['question'];
        // Ignorer les '
        $question = addslashes($question);


        // Quand le bouton est préssé
        if (isset($_POST['valider']) and $_POST['valider'] == 'Envoyer') {
          // Vérifier si il y a du texte dans la case question, si non, alors afficher Veuillez ...
          if (empty($_POST['question'])) {
            echo "<br><br><p style='color:red'><i class='fas fa-exclamation-triangle'></i>Veuillez remplir le champ 'Question'";
          }
          // Si il y a du texte alors ...
          else {
            // Requete pour ajouter une ligne a la base de donné puisqu'il y a déjà une réponse
            $reqInsert = "INSERT INTO Questions (question) VALUES ('" . $question . "')";
            mysqli_query($db, $reqInsert);
            //Envoie d'un mail automatique à chaque nouvelle question
            // $to      = 'ecmr@groupeblondel.com';
            $to = 'troelstrate@gmail.com';
            $subject = 'Ajout d\'une question dans le forum';
            $message = $question;
            $headers = 'From: plateformeFAQ@groupeblondel.com' . "\r\n" .
            'Reply-To: plateformeFAQ@groupeblondel.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
            header('Location: validationReponse.php');
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