<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <!-- Container wrapper -->
    <div class="container">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0 text-center" <?php if($_GET['admin']=="05lrM3"){ echo 'href="../vue/admin.php?admin=05lrM3"';} else{ echo 'href="../index.php"';}?>>
          <img src="../image/logo.png" height="60" loading="lazy" alt="Image Groupe Blondel" />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link pe-3" <?php if($_GET['admin']=="05lrM3"){ echo 'href="../vue/admin.php?admin=05lrM3"';} else{ echo 'href="../index.php"';}?>><b>Accueil</b></a>
          </li>
          <li class="nav-item none">
            <a class="nav-link pe-3"><b>|</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link pe-3" <?php if($_GET['admin']=="05lrM3"){ echo 'href="../vue/ajoutQuestion.php?admin=05lrM3"';} else{echo 'href="../vue/ajoutQuestion.php"';}?>><b>Poser une question</b></a>
          </li>
          <li class="nav-item none">
            <a class="nav-link pe-3"><b>|</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link pe-3" href="https://docandtrack.groupeblondel.com/video/index.html" target="_blank"><b>Vidéo Formation</b></a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="d-flex mt-2">
        <?php
        if ($_GET['admin'] == "05lrM3") {
          echo 'Vous etes connecté';
        }
        else {
          echo '<a href="../vue/connexion.php">WebMaster</a>';
        }
        ?>

        <!-- Icon -->

        <!-- Right elements -->
      </div>
      <!-- Container wrapper -->
    </div>
  </nav>
</body>

</html>