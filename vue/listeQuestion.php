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
  <!-- Fin lien  -->

  <!-- Card contenant -->
  <div class="container mt-3">
    <div class="row mb-3">
      <div class="col">
        <section class="card">
          <div class="card-body">
            <div class="row">
              <!-- Barre recherche -->
              <div class="col-lg-8 ms-lg-5">
                <h4>~~ Barre de recherche ~~</h4>
                <form action="listeRecherche.php" method="GET">
                <div class="mt-3 col-xs-6 col-sm-12 col-md-4 col-lg-6 my-auto">
                  <div class="input-group">
                    <div class="form-outline">
                      <input class="search__input form-control" id="searchbar" onkeyup="chercher()" type="text" name="search">
                      <label class="form-label" for="form1">Chercher par mots clés</label>
                    </div>
                    <button id="btn" name="clickRecherche" type="submit" class="btn btn-primary" value="iconeRecherche">
                      <i class="fas fa-search" ></i>
                    </button>
                  </div>
                </div>
                </form>
              </div>
              <!-- fin barre recherche -->
              <!-- Formulaire pour les checkbox -->
              <!-- <div class="ecart col-xs-6 col-sm-12 col-md-8 col-lg-4 mx-auto">
                <h4>Filtres</h4>
                <form action="" method="post">
                  <div class="form-check">
                    <input class="form-check-input" id="searchCheck" onclick="checkBox()" type="checkbox" name="searchBox1" value="oui">
                    <label class="form-check-label" for="searchCheck">Avec une réponse</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" id="searchCheck2" onclick="checkBox()" type="checkbox" name="search" value="non">
                    <label class="form-check-label" for="searchCheck2">Sans réponse</label>
                  </div>
                </form>
              </div> -->
              <!-- Fin formulaire checkbox -->
            </div>
        </section>
      </div>
    </div>
  </div>
  <!-- Fin combo box -->
  <br>
  <?php
  //Requete bdd

  $ligne = "SELECT * FROM Questions ORDER BY id ASC";
  $result = mysqli_query($db, $ligne);

  // On récupère le nombre de lignes
  $reqCount = "SELECT COUNT(*) AS nbr_ligne FROM Questions";
  $reqCount = mysqli_query($db, $reqCount);
  $tableau = mysqli_fetch_assoc($reqCount);
  $numLigne = $tableau['nbr_ligne'];

  // $ligne = $bdd1->prepare("SELECT * FROM Questions ORDER BY id ASC");
  // $ligne = execute-> (array());
  ?>

  <!-- Début accordéon (main) -->
  <div class="container FirstCon" style="font-family: robotothin">
    <div class="accordion" id="accordionExample">

      <!-- Début boucle pour afficher chaque question -->
      <?php
      //Déterminer la page dans laquelle on est
      if (isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = (int) strip_tags($_GET['page']);
      } else {
        $currentPage = 1;
      }
      //Récupérer la page dans l'URL
      $pageURL = (!empty($_GET['page']) ? $_GET['page'] : 1);

      //Limite de ligne affichée
      $limite = 10;
      $i = 0;

      while ($resultat = mysqli_fetch_array($result)) {
        // Boucle pour afficher 10 lignes par page
        if ($i == $limite * $pageURL) {
          break;
        } else {
          if (($limite * $pageURL) >= $i and $i >= $tour) {
            // while ($resultat = $ligne->fetch()) {
            // Définir la question et l'id dans des variables pour ensuite les récupérer dans le fichier ajoutReponse.php
            $uneQuestion = $resultat['question'];
      ?>
            <!-- 1 Module Accordéon / recherche correspond au code de la searchBar -->
            <div class="accordion-item searchCheckbox searchCheckbox2 <?php if ($pageURL != 1 and $i == 0) {
                                                                        echo 'd-none';
                                                                      } ?>">
              <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                <!-- backcolor est dans le fichier css -->
                <button class="accordion-button text-black backcolor" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i == $tour) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
                  <?php
                  echo $uneQuestion;
                  $idQuestion = $resultat['id'];
                  ?>
                  <!-- Ligne îcone -->
                  <?php
                  if ($resultat['reponse']) {
                    echo '<i style="color:green" alt="oui" class="fas fa-check fa-lg ms-2 mr-auto contenantReponse"></i>';
                  } else {
                    echo '<i style="color:red" alt="non" class="fas fa-times fa-lg category-two ms-2 mr-auto sansReponse"></i>';
                  }
                  ?>
                  <!-- Fin lignes îcone -->
                </button>
              </h2>
              <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php if ($i == $tour) {
                                                                                        echo 'show';
                                                                                      } ?>" aria-labelledby="heading<?php echo $i; ?>" data-mdb-parent="#accordionExample">
                <div class="accordion-body backcolor">
                  <!-- Si le résultat à une réponse et un prénom, alors afficher les deux + le bouton -->
                  <?php
                  if ($resultat['reponse']) {
                    if ($resultat['prenom']) {
                      echo "Prénom : " . $resultat['prenom'] . "<br>";
                    }
                  ?>
                    <!-- Afficher la date -->
                    <?php
                    $d = date("d/m/Y", strtotime($resultat['date']));
                    echo "<b class='small'>Le : " . $d . "</b><br>" ?>
                    <?php
                    // Si le résultat a une réponse mais pas de prénom, afficher la réponse + le bouton
                    echo $resultat['reponse'];
                    ?> <br><br><a href="ajoutReponse.php?rep=1&id=<?php echo $idQuestion; ?>"><input type="submit" name="boutonReponse" class="espace btn btn-primary" value="Ajouter une réponse"></input></a>
                    <a href="listeReponse.php?id=<?php echo $idQuestion; ?>"><input type="submit" name="boutonVoirPlus" class="centre btn btn-primary md" value="Voir + de réponse"></input></a>
                  <?php
                  }
                  // Si le résultat n'a pas de réponse, afficher juste le bouton
                  else {
                  ?><a href="ajoutReponse.php?rep=0&id=<?php echo $idQuestion; ?>"><input type="submit" name="boutonReponse" class="espace btn btn-primary" value="Ajouter une réponse"></input></a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
      <?php
            //Définir $tour pour afficher les lignes
            if ($pageURL == 1) {
              $tour = 0;
            } else {
              $tour = ($pageURL * 10) - 10;
            }
          }
        }
        $i++;
      }
      ?>
      <!--Fin du module -->
      <!-- Div espace -->
      <div class="col-12 mb-5"></div>
      <!-- Début pagination  -->

      <nav>
        <ul class="justify-content-center pagination">
          <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
          <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="listeQuestion.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
          </li>
          <?php for ($page = 1; $page <= ceil($numLigne / $limite); $page++) : ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
              <a href="listeQuestion.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
          <?php endfor ?>
          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
          <li class="page-item <?= ($currentPage == ceil($numLigne / $limite)) ? "disabled" : "" ?>">
            <a href="listeQuestion.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
          </li>
        </ul>
      </nav>
      <!-- Fin pagination -->
            
















      
  <!-- Espace de fin -->
  <div class="col-12 mb-5"></div>
  <!-- Link js -->
  <script src="js/searchBar.js"></script>
  <!-- link bootstrap -->
  <?php include_once "../controleur/bootstrapJS.php" ?>
</body>

</html>