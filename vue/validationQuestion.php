<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php
  include_once "../controleur/bootstrapCSS.php";
  include_once "../controleur/bddConnect.php";
  include "entete.php";
  ?>
  <div class="container-fluid">
    <div class="col-xl-8 col-xs-12 mx-auto text-center border border-2 border-dark p-3">
      <p class="lead">Votre question à bien été prise en compte</p><br>
      <a href="listeQuestion.php"><input class="btn btn-primary" name="valider" type="submit" value="Retour à l'accueil" /></a>
    </div>
  </div>
  <?php include_once "../controleur/bootstrapJS.php" ?>
</body>

</html>