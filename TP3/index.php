<?php
include 'PHP/functions.php';
$animaux = parseCsv('data/animaux.csv');
$cinqAnimaux = animauxAleatoire();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Refuge K&eacute;roack</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="vendor/css/carousel.css" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="PHP/adoption.php">Mise en l'adoption</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="PHP/animaux.php">Animaux</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" method="get" action="PHP/recherche.php">
                <input name="recherche" class="form-control mr-sm-2" type="text" placeholder="Rechercher"
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
</header>

<main>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="img/puppy-1903313_1920.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-left text-dark">
                        <h1>Donnez une deuxi&egrave;me vie !</h1>
                        <p>Peu importe la circonstance dans laquelle vous vous trouvez, si vous devez vous d&eacute;partir
                            de
                            votre animal, pensez &agrave; lui donner une deuxi&egrave;me vie et en rendant une autre
                            famille
                            heureuse!</p>
                        <p><a class="btn btn-lg btn-outline-dark" href="PHP/adoption.php" role="button">Mise en
                                l'adoption</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="img/cat-1285634_1920.png" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Un choix qui fait des heureux</h1>
                        <p>Que vous soyez seul et voulez de la compagnie ou que vous voulez ajouter &agrave; votre
                            famille un
                            nouveau compagnon, visitez notre galerie pour voir la liste compl&egrave;tes des animaux</p>
                        <p><a class="btn btn-lg btn-outline-light" href="PHP/animaux.php" role="button">Voir les
                                animaux</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Pr&eacute;c&eacute;dent</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <?php
            if (array_key_exists(0, $cinqAnimaux) && $cinqAnimaux[0] != null) {
                echo '
            <div  class="fiche col-lg-3 rounded border border-success text-center">
                <h2>' . $cinqAnimaux[0][1] . '</h2>
                <p>Type : ' . $cinqAnimaux[0][2] . '<br>
                    Race : ' . $cinqAnimaux[0][3] . '<br>
                    Age : ' . $cinqAnimaux[0][4];
                if ($cinqAnimaux[0][4] > 1) echo ' ans'; else echo ' an';
                echo '<br></p>';
                $animal1 = "PHP/animal.php?id=" . urlencode($cinqAnimaux[0][0]) . "&nom=" . urlencode($cinqAnimaux[0][1]) . "&type=" . urlencode($cinqAnimaux[0][2]) . "&race=" . urlencode($cinqAnimaux[0][3]) . "&age=" . urlencode($cinqAnimaux[0][4]) . "&description=" . urlencode($cinqAnimaux[0][5]) . "&courriel=" . urlencode($cinqAnimaux[0][6]) . "&adresse=" . urlencode($cinqAnimaux[0][7]) . "&ville=" . urlencode($cinqAnimaux[0][8]) . "&cp=" . urlencode($cinqAnimaux[0][9]);
                echo "<p><a class='justify-content-end btn btn-outline-success my-2 my-sm-0' href=$animal1 role='button'>Fiche animal &raquo;</a></p>";
            } ?>
        </div>
        <div class="col-lg-1"></div>
        <?php
        if (array_key_exists(1, $cinqAnimaux) && $cinqAnimaux[1] != null) {
            echo '
            <div  class="fiche col-lg-3 rounded border border-success text-center">
                <h2>' . $cinqAnimaux[1][1] . '</h2>
                <p>Type : ' . $cinqAnimaux[1][2] . '<br>
                    Race : ' . $cinqAnimaux[1][3] . '<br>
                    Age : ' . $cinqAnimaux[1][4];
            if ($cinqAnimaux[1][4] > 1) echo ' ans'; else echo ' an';
            echo '<br></p>';
            $animal2 = "PHP/animal.php?id=" . urlencode($cinqAnimaux[1][0]) . "&nom=" . urlencode($cinqAnimaux[1][1]) . "&type=" . urlencode($cinqAnimaux[1][2]) . "&race=" . urlencode($cinqAnimaux[1][3]) . "&age=" . urlencode($cinqAnimaux[1][4]) . "&description=" . urlencode($cinqAnimaux[1][5]) . "&courriel=" . urlencode($cinqAnimaux[1][6]) . "&adresse=" . urlencode($cinqAnimaux[1][7]) . "&ville=" . urlencode($cinqAnimaux[1][8]) . "&cp=" . urlencode($cinqAnimaux[1][9]);
            echo "<p><a class='justify-content-end btn btn-outline-success my-2 my-sm-0' href=$animal2 role='button'>Fiche animal &raquo;</a></p>";
        } ?>
    </div>
    <div class="col-lg-1"></div>
    <?php
    if (array_key_exists(2, $cinqAnimaux) && $cinqAnimaux[2] != null) {
        echo '
            <div  class="fiche col-lg-3 rounded border border-success text-center">
                <h2>' . $cinqAnimaux[2][1] . '</h2>
                    <p>Type : ' . $cinqAnimaux[2][2] . '<br>
                        Race : ' . $cinqAnimaux[2][3] . '<br>
                        Age : ' . $cinqAnimaux[2][4];
        if ($cinqAnimaux[2][4] > 1) echo ' ans'; else echo ' an';
        echo '<br></p>';
        $animal3 = "PHP/animal.php?id=" . urlencode($cinqAnimaux[2][0]) . "&nom=" . urlencode($cinqAnimaux[2][1]) . "&type=" . urlencode($cinqAnimaux[2][2]) . "&race=" . urlencode($cinqAnimaux[2][3]) . "&age=" . urlencode($cinqAnimaux[2][4]) . "&description=" . urlencode($cinqAnimaux[2][5]) . "&courriel=" . urlencode($cinqAnimaux[2][6]) . "&adresse=" . urlencode($cinqAnimaux[2][7]) . "&ville=" . urlencode($cinqAnimaux[2][8]) . "&cp=" . urlencode($cinqAnimaux[2][9]);
        echo "<p><a class='justify-content-end btn btn-outline-success my-2 my-sm-0' href=$animal3 role='button'>Fiche animal &raquo;</a></p>";
    } ?>
    </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-2"></div>
        <?php
        if (array_key_exists(3, $cinqAnimaux) && $cinqAnimaux[3] != null) {
            echo '
            <div  class="fiche col-lg-3 rounded border border-success text-center">
                <h2>' . $cinqAnimaux[3][1] . '</h2>
                <p>Type : ' . $cinqAnimaux[3][2] . '<br>
                    Race : ' . $cinqAnimaux[3][3] . '<br>
                    Age : ' . $cinqAnimaux[3][4];
            if ($cinqAnimaux[3][4] > 1) echo ' ans'; else echo ' an';
            echo '<br></p>';
            $animal4 = "PHP/animal.php?id=" . urlencode($cinqAnimaux[3][0]) . "&nom=" . urlencode($cinqAnimaux[3][1]) . "&type=" . urlencode($cinqAnimaux[3][2]) . "&race=" . urlencode($cinqAnimaux[3][3]) . "&age=" . urlencode($cinqAnimaux[3][4]) . "&description=" . urlencode($cinqAnimaux[3][5]) . "&courriel=" . urlencode($cinqAnimaux[3][6]) . "&adresse=" . urlencode($cinqAnimaux[3][7]) . "&ville=" . urlencode($cinqAnimaux[3][8]) . "&cp=" . urlencode($cinqAnimaux[3][9]);
            echo "<p><a class='justify-content-end btn btn-outline-success my-2 my-sm-0' href=$animal4 role='button'>Fiche animal &raquo;</a></p>";
        } ?>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-2"></div>
    <?php
    if (array_key_exists(4, $cinqAnimaux) && $cinqAnimaux[4] != null) {
        echo '
            <div  class="fiche col-lg-3 rounded border border-success text-center">
                <h2>' . $cinqAnimaux[4][1] . '</h2>
                <p>Type : ' . $cinqAnimaux[4][2] . '<br>
                    Race : ' . $cinqAnimaux[4][3] . '<br>
                    Age : ' . $cinqAnimaux[4][4];
        if ($cinqAnimaux[4][4] > 1) echo ' ans'; else echo ' an';
        echo '<br></p>';
        $animal5 = "PHP/animal.php?id=" . urlencode($cinqAnimaux[4][0]) . "&nom=" . urlencode($cinqAnimaux[4][1]) . "&type=" . urlencode($cinqAnimaux[4][2]) . "&race=" . urlencode($cinqAnimaux[4][3]) . "&age=" . urlencode($cinqAnimaux[4][4]) . "&description=" . urlencode($cinqAnimaux[4][5]) . "&courriel=" . urlencode($cinqAnimaux[4][6]) . "&adresse=" . urlencode($cinqAnimaux[4][7]) . "&ville=" . urlencode($cinqAnimaux[4][8]) . "&cp=" . urlencode($cinqAnimaux[4][9]);
        echo "<p><a class='justify-content-end btn btn-outline-success my-2 my-sm-0' href=$animal5 role='button'>Fiche animal &raquo;</a></p>";
    } ?>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-2"></div>

    </div><!-- /.row -->

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Venez nous visiter et ... <span
                        class="text-muted">repartez avec un ami !</span></h2>
            <br>
            <p class="lead">Nous sommes ouvert 7 jours sur 7 de 9h-17h. Venez visiter nos installations et qui sait
                .. vous aller peut-être tomber en amour !</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="img/carte.png" data-src="holder.js/500x500/auto"
                 alt="Carte">
        </div>
    </div>

    <hr class="featurette-divider">
    <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Retour en haut</a></p>
        <p>&copy; Samuel K&eacute;roack &middot; KERS15059307 &middot; <a
                    href="https://getbootstrap.com/docs/5.0/examples/carousel/">Source Bootstrap</a></p>
    </footer>
</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="vendor/js/jquery-3.5.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="vendor/js/jquery-3.5.1.slim.min.js"><\/script>')</script>
<script src="vendor/js/popper.min.js"></script>
<script src="vendor/js/bootstrap.min.js"></script>
</body>
</html>

