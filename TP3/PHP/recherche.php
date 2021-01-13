<?php
include 'functions.php';
$keyword = strtolower($_GET["recherche"]);
$resultats = rechercher($keyword, '../data/animaux.csv');
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Refuge K&eacute;roack</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="../vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../vendor/css/carousel.css" rel="stylesheet">

    <link href="../css/main.css" rel="stylesheet">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Refuge K&eacute;roack</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adoption.php">Mise en l'adoption</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="animaux.php">Animaux</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" method="get" action="recherche.php">
                <input name="recherche" class="form-control mr-sm-2" type="text" placeholder="Rechercher"
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
</header>
<?php
$nbLignes = count($resultats);
echo "<div class='animaux'>
    <h2>R&eacute;sultats :</h2>
    <h3>$nbLignes r&eacute;sultat(s) correspondant(s) trouv&eacute;(s)</h3>";
if ($nbLignes != 0) {
    echo"
    <hr>
    <br>
    <div class='container marketing'>";
    imprimerResultats($resultats);
    echo "</div></div>";
}
?>

<hr class="featurette-divider">

<!-- FOOTER -->
<footer class="container">
    <p class="float-right"><a href="#">Retour en haut</a></p>
    <p>&copy; Samuel K&eacute;roack &middot; KERS15059307 &middot; <a
                href="https://getbootstrap.com/docs/5.0/examples/carousel/">Source Bootstrap</a></p>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../vendor/js/jquery-3.5.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../vendor/js/jquery-3.5.1.slim.min.js"><\/script>')</script>
<script src="../vendor/js/popper.min.js"></script>
<script src="../vendor/js/bootstrap.min.js"></script>
</body>
</html>
