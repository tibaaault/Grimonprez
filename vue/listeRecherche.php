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
            <?php
            //Requete bdd
            $laRechercheURL = $_GET['search'];
            $reqRecherche = mysqli_query($db, "SELECT * FROM Questions WHERE question LIKE '%$laRechercheURL%' ORDER BY reponse DESC");
            // On récupère le nombre de lignes
            $reqCount = "SELECT COUNT(*) AS nbr_ligne FROM Questions WHERE question LIKE '%$laRechercheURL%'";
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
                    echo "<div class='container'><div class='col-12'>";
                    echo "<p class='h3 text-center mb-5 lead'><b><u>Recherche : " . $laRechercheURL . "</u></b></h1>";
                    echo "</div>";
                    if ($numLigne == 0) {
                        echo '<section class="card shadow-lg mb-5 rounded">
                                    <div class="card-body">
                                    <p class="h1 text-center lead">
                                    Aucun résultat
                                    </p>
                                    </div>
                                </section>';
                    }
                    echo "</div>";
                    //Déterminer la page dans laquelle on est
                    if (isset($_GET['page']) && !empty($_GET['page'])) {
                        $currentPageQ = (int) strip_tags($_GET['page']);
                    } else {
                        $currentPageQ = 1;
                    }
                    //Récupérer la page dans l'URL
                    $pageQURL = (!empty($_GET['page']) ? $_GET['page'] : 1);

                    //Limite de ligne affichée
                    $limite = 10;
                    $i = 0;



                    while ($resultat = mysqli_fetch_array($reqRecherche)) {
                        // Boucle pour afficher 10 lignes par page
                        if ($i == $limite * $pageQURL) {
                            break;
                        } else {
                            if (($limite * $pageQURL) >= $i and $i >= $tour) {
                                // while ($resultat = $ligne->fetch()) {
                                // Définir la question et l'id dans des variables pour ensuite les récupérer dans le fichier ajoutReponse.php
                                $uneQuestion = $resultat['question'];
                    ?>
                                <!-- 1 Module Accordéon / recherche correspond au code de la searchBar -->
                                <div class="accordion-item searchCheckbox searchCheckbox2 <?php if ($pageQURL != 1 and $i == 0) {
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
                                if ($pageQURL == 1) {
                                    $tour = 0;
                                } else {
                                    $tour = ($pageQURL * 10) - 10;
                                }
                            }
                        }
                        $i++;
                    }
                    ?>
                </div>
            </div>

            <!-- Div espace -->
            <div class="col-12 mb-5"></div>
            <!-- Début pagination  -->

            <nav>
                <ul class="justify-content-center pagination">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPageQ == 1) ? "disabled" : "" ?>">
                        <a href="listeRecherche.php?page=<?= $currentPageQ - 1 ?>&search=<?php echo $laRechercheURL ?>" class="page-link"> < Précédente</a>
                    </li>
                    <?php for ($pageQ = 1; $pageQ <= ceil($numLigne / $limite); $pageQ++) : ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPageQ == $pageQ) ? "active" : "" ?>">
                            <a href="listeRecherche.php?page=<?= $pageQ ?>&search=<?php echo $laRechercheURL ?>" class="page-link"><?= $pageQ ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPageQ == ceil($numLigne / $limite)) ? "disabled" : "" ?>">
                        <a href="listeRecherche.php?page=<?= $currentPageQ + 1 ?>&search=<?php echo $laRechercheURL ?>" class="page-link">Suivante ></a>
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