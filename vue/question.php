<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php
include_once "../controleur/bootstrapCSS.php";
include_once "../controleur/bddConnect.php";
include "entete.php";
?>
    <!-- Barre de recherche -->
    <div class='container'">
    <div class="content-wrapper">
      <div class="row text-center">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <form class="navbar-form">
            <div class="input-group">
              <div class="form-outline">
                <input type="search" id="form1" class="form-control" />
                <label class="form-label" for="form1">Search</label>
              </div>
              <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Fin barre de recherche -->

    <?php
//Requete bdd
$ligne = "SELECT * FROM Questions ORDER BY id ASC";
$result = mysqli_query($db, $ligne);

?>
<!-- Début accordéon (main) -->
<div class="container" style="font-family: robotothin">
<div class="accordion" id="accordionExample">

<!-- Début boucle pour afficher chaque question -->
<?php
$i = 1;
while ($resultat = mysqli_fetch_array($result)) {
    // if ($i = $resultId){
    // Définir la question et l'id dans des variables pour ensuite les récupérer dans le fichier formulaireAjout.php
    $uneQuestion = $resultat['question'];
    
    
    ?>
  <!-- 1 Module Accordéon-->
<div class="accordion-item">
  <h2 class="accordion-header" id="heading<?php echo $i; ?>">
    <button
      class="accordion-button text-black"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#collapse<?php echo $i; ?>"
      aria-expanded="<?php echo ($i == 1) ? 'true' : 'false'; ?>"
      aria-controls="collapse<?php echo $i; ?>"
    >
    <?php
    echo $uneQuestion;
    $idQuestion = $resultat['id']; 
    echo $resultat['id'];
    ?>
<!-- Ligne îcone -->
<?php
if ($resultat['reponse']) {
        echo '<i style="color:green" class="fas fa-check fa-lg ms-2"></i>';
    } else {
        echo '<i style="color:red" class="fas fa-times fa-lg ms-2"></i>';
    }
    ?>
<!-- Fin lignes îcone -->
    </button>
  </h2>
  <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php if ($i == 1) {
        echo 'show';
    }
    ?>" aria-labelledby="heading<?php echo $i; ?>" data-mdb-parent="#accordionExample">
    <div class="accordion-body">
    <!-- Si le résultat à une réponse et un prénom, alors afficher les deux + le bouton -->
    <?php
    

if ($resultat['reponse']) {
        if ($resultat['prenom']) {
            echo "Prénom : " . $resultat['prenom'] . "<br>";
        }
        // Si le résultat a une réponse mais pas de prénom, afficher la réponse + le bouton
        echo $resultat['reponse'];
        ?> <br><br><a href="formulaireAjout.php?id=<?php echo $idQuestion; ?>"><input type="submit" name="boutonReponse" class="btn btn-primary" value="Ajouter une réponse"></input></a>
        <?php
    }
    // Si le résultat n'a pas de réponse, afficher juste le bouton
    else {
        ?><a href="formulaireAjout.php?id=<?php echo $idQuestion; ?>"><input type="submit" name="boutonReponse" class="btn btn-primary" value="Ajouter une réponse"></input></a>
  <?php  
  }
    ?>
    </div>
  </div>
</div>
<?php
$i++;
}
?>

    <!--Fin du module -->

    <!-- link bootstrap -->
    <?php include_once "../controleur/bootstrapJS.php"?>
  </body>
</html>


