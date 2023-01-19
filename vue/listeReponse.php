<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reponses</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <?php
    include_once "../controleur/bootstrapCSS.php";
    include_once "../controleur/bddConnect.php";
    include "entete.php";
    ?>
    <!-- Barre de recherche -->
    <div class='container'>
        <div class=" content-wrapper">
            <div class="row text-center ">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="search">
                        <input class="search__input" id="searchbar" onkeyup="chercher()" type="text" name="search" placeholder="Chercher par mots clés">
                        <i class="loupe fas fa-lg fa-search"></i>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <!-- Fin barre de recherche -->


        <?php
        // On recupere l'ID contenue dans l'URL
        $idURL = $_GET['id'];
        // Requête pour la table Questions
        $selectSimple = mysqli_query($db, "SELECT * FROM Questions WHERE id = $idURL");
        // Requête pour la table MultiReponse
        $selectMulti = mysqli_query($db, "SELECT * FROM Questions, MultiReponse WHERE id = $idURL AND Questions.id = MultiReponse.idQ;");
        ?>
        <div class='container'>
            <div class=" content-wrapper">
                <?php
                // Afficher ce qui se trouve dans la table Questions
                while ($ligne = mysqli_fetch_array($selectSimple)) {
                ?>
                    <!-- Afficher la question -->
                    <!-- Module titre -->
                    <div class="card text-center mb-4 pt-3 shadow-5-strong">
                        <div class="card-body h3">
                            <?php
                            echo $ligne['question'];
                            ?>
                        </div>
                    </div>
                    <!-- Fin module titre -->
                    <!-- Ligne de module  -->
                    <div class="col-12 mb-3">
                        <div class="card shadow-5-strong">
                            <div class="card-body recherche ">
                                <!-- Fin ligne de module -->
                                <!-- Afficher le prénom s'il existe -->
                                <?php if ($ligne['prenom']) { ?>
                                    <div class="col-12 ms-5 ">
                                        <?php
                                        echo "Prénom : " . $ligne['prenom'] . "   <br>";
                                        ?>
                                    </div>
                                <?php } ?>
                                <!-- Afficher la date -->
                                <div class="col-12 ms-5">
                                    <?php
                                    $d = date("d/m/Y", strtotime($ligne['date']));
                                    echo "<b class='small'>Le : " . $d . "</b><br>" ?>
                                </div>
                                <!-- Afficher la réponse -->
                                <div class="col-12 lead ms-6 mb-2">
                                    <em>
                                        <?php
                                        echo $ligne['reponse'];
                                        ?>
                                    </em>
                                </div>
                                <!-- Fin réponse -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin module -->
                    <?php
                }
                // Afficher ce qui se trouve dans la table MultiReponse
                while ($ligne = mysqli_fetch_array($selectMulti)) {
                    if ($ligne['reponse']) {
                    ?>
                        <!-- Module pour une réponse / recherche correspond au code de la barre search-->
                        <div class="col-12 mb-3 recherche">
                            <!-- shadow-5-strong correspond à la box-shadow -->
                            <div class="card shadow-5-strong">
                                <div class="card-body ">
                                    <!-- Afficher le prénom s'il existe -->
                                    <?php if ($ligne['prenom']) { ?>
                                        <div class="col-12 ms-5">
                                            <?php
                                            echo "Prénom : " . $ligne['prenom'] . "<br>";
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <!-- Afficher date -->
                                    <div class="col-12 ms-5">
                                        <?php
                                        $d = date("d/m/Y", strtotime($ligne['date']));
                                        echo "<b class='small'>Le : " . $d . "</b><br>" ?>
                                    </div>
                                    <!-- Afficher la réponse -->
                                    <div class="col-12 lead ms-6 mb-2">
                                        <em>
                                            <?php
                                            echo $ligne['reponse'];
                                            ?>
                                        </em>
                                    </div>
                                    <!-- Fin réponse -->
                                </div>
                            </div>
                        </div>
                        <!-- Fin module pour une réponse -->

                <?php
                    }
                }
                ?>
            </div>
            <!-- Espace -->
            <div class="col-12 mb-5"></div>
            <!-- Bouton ajouter une reponse -->
            <div class="col-12 text-center">
                <a href="ajoutReponse.php?rep=1&id=<?php echo $idURL; ?>"><input type="submit" name="boutonReponse" class="espace btn btn-primary btn-lg" value="Ajouter une réponse"></input></a>
            </div>
            <!-- Espace de fin -->
            <div class="col-12 mb-5"></div>
            <!-- Link js -->
            <script src="js/searchBar.js"></script>
            <!-- link bootstrap -->
            <?php
            include_once "../vue/footer.php";
            include_once "../controleur/bootstrapJS.php" ?>
</body>

</html>