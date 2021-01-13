<?php
include 'functions.php';
$animaux = parseCsv('../data/animaux.csv');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Galerie des animaux</title>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

    <link href="https://getbootstrap.com/docs/4.0/examples/carousel/" rel="canonical">

    <!-- Bootstrap core CSS -->
    <link href="../vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../vendor/css/carousel.css" rel="stylesheet">

    <link href="../css/main.css" rel="stylesheet">

</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="../index.php">Refuge K&eacute;roack</a>
        <button aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"
                data-target="#navbarCollapse" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adoption.php">Mise en l'adoption</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Animaux <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" method="get" action="recherche.php">
                <input aria-label="Search" class="form-control mr-sm-2" name="recherche" placeholder="Rechercher"
                       type="text">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
</header>
<div>
    <h2 class="animaux">Voici la liste des animaux en adoption :</h2>
    <h5 class="text-muted sub-animaux">Cliquez sur une fiche pour contacter le propri&eacute;taire</h5>
    <hr>
    <br>
    <div class='container marketing'>
        <?php
        if (count($animaux) != 0) {
            imprimerFiches($animaux);
        } else {
            echo "<h5>Nous n'avons aucun animal en adoption pr&eacute;sentement.</h5>";
        }
        ?>
    </div>
</div>
<hr class="featurette-divider">

<footer class="container">
    <p class="float-right"><a href="#">Retour en haut</a></p>
    <p>&copy; Samuel K&eacute;roack &middot; KERS15059307 &middot; <a
                href="https://getbootstrap.com/docs/5.0/examples/carousel/">Source Bootstrap</a></p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script crossorigin="anonymous"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        src="../vendor/js/jquery-3.5.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="../vendor/js/jquery-3.5.1.slim.min.js"><\/script>')</script>
<script src="../vendor/js/popper.min.js"></script>
<script src="../vendor/js/bootstrap.min.js"></script>
<script src="../js/global.js"></script>
</body>
</html>