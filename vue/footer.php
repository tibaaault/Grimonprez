  <!-- Lien vers Bootstrap / Connexion BDD / Entete -->
  <?php
  session_start();
  include_once "../controleur/bootstrapCSS.php";
  include_once "../controleur/bddConnect.php";
  ?>
  <!-- Fin lien  -->

<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted mx-auto"><b>© 2022 Groupe Blondel</b></p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-md-4 justify-content-end text-center mx-auto">
      <li class="nav-item"><a href="../vue/listeQuestion.php" class="nav-link px-2 text-muted">Accueil</a></li>
      <li class="nav-item"><a href="../vue/ajoutQuestion.php" class="nav-link px-2 text-muted">Poser une question</a></li>
    </ul>
  </footer>
  </div>
    <!-- Link js -->
    <script src="js/searchBar.js"></script>
  <!-- link bootstrap -->
  <?php include_once "../controleur/bootstrapJS.php" ?>