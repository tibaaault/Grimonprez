<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum</title>
    <link rel="stylesheet" href="../css/style.css" />
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
    <div class="container mt-3 mx-auto" id="container">
        <p class="h2 text-center mb-4"><u>CGU</u></p>
        <section class="card mb-4 border">
            <div class="card-body">
                <p><strong> Présentation</strong></p>
                <p>Le forum du Groupe Blondel est consacré à l'échange d'informations concernant l'eCMR.</p>
                <p>Il y est possible de : </p>
                <ul>
                    <li>Ajouter des questions</li>
                    <li>Répondre à des questions</li>
                    <li>Consulter des réponses</li>
                    <li>Effectuer des recherches sur un sujet spécifique</li>
                </ul>
            </div>
        </section>
        <section class="card mb-4 border">
            <div class="card-body">
                <p><strong>Modification des conditions d’utilisation</strong></p>
                <p>L’EDITEUR se réserve la possibilité de modifier, à tout moment et sans préavis, les présentes conditions d’utilisation afin de les adapter aux évolutions du site et/ou de son exploitation.</p>
            </div>
        </section>
        <section class="card mb-4 border">
            <div class="card-body">
                <!-- Barre recherche -->
                <p><strong>Règles d'usage d'Internet</strong></p>
                <p>L’utilisateur déclare accepter les caractéristiques et les limites d’Internet, et notamment reconnaît que :</p>
                <p>L’EDITEUR n’assume aucune responsabilité sur les services accessibles par Internet et n’exerce aucun contrôle de quelque forme que ce soit sur la nature et les caractéristiques des données qui pourraient transiter par l’intermédiaire de son centre serveur.</p>
                <p>L’utilisateur reconnaît que les données circulant sur Internet ne sont pas protégées notamment contre les détournements éventuels. La présence du logo Groupe Blondel institue une présomption simple de validité. La communication de toute information jugée par l’utilisateur de nature sensible ou confidentielle se fait à ses risques et périls.</p>
                <p>L’utilisateur reconnaît que les données circulant sur Internet peuvent être réglementées en termes d’usage ou être protégées par un droit de propriété.</p>
                <p>L’utilisateur est seul responsable de l’usage des données qu’il consulte, interroge et transfère sur Internet.</p>
                <p>L’utilisateur reconnaît que l’EDITEUR ne dispose d’aucun moyen de contrôle sur le contenu des services accessibles sur Internet</p>
                <p>L’utilisateur s'engage à ne pas promulger, publier ; d'injures, de mots offensant, discriminatoire ou à caractère sexuel. </p>
            </div>
        </section>
        <section class="card mb-4 border">
            <div class="card-body">
                <p><strong>Modération</p></strong>
                <p>L’EDITEUR se réserve la possibilité de modifier, à tout moment et sans préavis, les questions et réponses allant à l'encontre de l'éthique de l'entreprise.</p>
                <p>La modération se réserve en particulier le droit de : </p>
                <ul>
                    <li>Fermer un sujet pour stopper un dérapage général de la discussion </li>
                    <li>Supprimer la totalité d'un sujet si le message de lancement ne respecte pas la Charte </li>
                    <li>Corriger un titre pour le rendre plus explicite, plus concis ou plus lisible </li>
                </ul>
            </div>
        </section>
    </div>
    <!-- Espace de fin -->
    <div class="col-12 mb-5"></div>


    <!-- link bootstrap -->
    <?php
    include_once "../controleur/bootstrapJS.php" ?>
</body>
<?php include_once "../vue/footer.php"; ?>

</html>