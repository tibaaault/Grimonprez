  <!-- Lien vers Bootstrap / Connexion BDD / Entete -->
  <?php
    session_start();
    include_once "../controleur/bootstrapCSS.php";
    include_once "../controleur/bddConnect.php";
    ?>
  <!-- Fin lien  -->
  <!-- <footer class="text-center text-white fixed-bottom">
  <div class="container p-4"></div>
  <div class="text-center p-3" style="background: red;">2020 Copyright
  <a class="text-white" href="#">test</a>
  </div>
  </footer> -->
  <footer class="bg-dark text-center text-light">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-8 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase"></h5>

        <p>
        N'hésitez pas à poser des questions sur l'eCMR, ou répondre à certaines questions auquelles vous avez la réponse.
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
        <div class="row text-start">
            <a <?php if($_GET['admin']=="05lrM3"){ echo 'href="../vue/admin.php?admin=05lrM3"';} else{ echo 'href="../index.php"';}?> class="text-light">Accueil</a>
            <a <?php if($_GET['admin']=="05lrM3"){ echo 'href="../vue/ajoutQuestion.php?admin=05lrM3"';} else{echo 'href="../vue/ajoutQuestion.php"';}?> class="text-light">Poser une question</a>
            <a <?php if($_GET['admin']=="05lrM3"){ echo 'href="../vue/CGU.php?admin=05lrM3"';} else{echo 'href="../vue/CGU.php"';}?> class="text-light">CGU</a>
            <a href="https://docandtrack.groupeblondel.com/video/index.html" target="_blank" class="text-light">Vidéo Formation</a>
            <a href="../image/Support formation Tx-Flex_v3.pdf" target="_blank" class="text-light">Support Formation</a>
        </div>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  <a href="https://www.groupe-blondel.com" class=" text-light">
    © Groupe Blondel
  </a>
  </div>
  <!-- Copyright -->
</footer>

  </footer>
  <!-- link bootstrap -->
  <?php include_once "../controleur/bootstrapJS.php" ?>


  </body>

  </html>