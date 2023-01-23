<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Validation de la réponse</title>
  <style>
    .container-fluid {
      height: 65% !important
    }
  </style>
</head>

<body>
  <?php
  session_start();
  include_once "../controleur/bootstrapCSS.php";
  include_once "../controleur/bddConnect.php";
  include "entete.php";
  $admin = $_GET['admin'];
  ?>
  <div class="container-fluid">
    <div class="col-xl-8 col-xs-12 mx-auto text-center border border-2 border-dark p-3">
      <p class="lead">Votre réponse à bien été prise en compte</p><br>
      <?php
      if ($admin == "05lrM3") { ?>
        <a href="admin.php?admin=05lrM3"><input class="btn btn-primary" name="valider" type="submit" value="Retour à l'accueil" /></a>
      <?php
      } else { ?>
        <a href="listeQuestion.php"><input class="btn btn-primary" name="valider" type="submit" value="Retour à l'accueil" /></a>
      <?php
      }
      ?>
    </div>
  </div>
  <?php
  include_once "../vue/footer.php";
  include_once "../controleur/bootstrapJS.php" ?>
</body>

</html>