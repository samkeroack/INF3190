<?php
include 'functions.php';
if (verifierDonnees()) {
    $animaux = parseCsv('../data/animaux.csv');
    $id = getLastId();
    $nom = $_POST["nom"];
    $type = $_POST["type"];
    $race = $_POST["race"];
    $age = $_POST["age"];
    $description = $_POST["description"];
    $courriel = $_POST["courriel"];
    $adresse = $_POST["adresse"];
    $ville = $_POST["ville"];
    $cp = $_POST["cp"];
    writeCsv('../data/animaux.csv', $nom, $type, $race, $age, $description, $courriel, $adresse, $ville, $cp);
    header("Location: ../HTML/confirmation.html?nom=" . urlencode($nom) . "&type=" . urlencode($type) . "&race=" . urlencode($race) . "&age=" . $age . "&description=" . urlencode($description) . "&courriel=" . urlencode($courriel) . "&adresse=" . urlencode($adresse) . "&ville=" . urlencode($ville) . "&cp=" . urlencode($cp), true, 303);
    exit;

}





?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise en adoption</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="../vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../vendor/css/carousel.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">
</head>
<body id="formulaire">
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="../index.php">Refuge K&eacute;roack</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Mise en l'adoption</a>
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
<form class="form" method="post" action="adoption.php" onsubmit="return validerFormulaire();">
    <div class="card-header">
        <h1>Formulaire</h1>
        <h4 class="text-muted">Pour mise en adoption : </h4>
        <hr>

        <div class="form-group"> <!-- Nom -->
            <label for="nom" class="control-label">Nom de l'animal</label>
            <input type="text" class="input form-control" id="nom" name="nom" placeholder="Rex">
            <span id="nom-erreur" class="msg-erreur"></span>
        </div>

        <div class="form-group"> <!-- Type -->
            <label for="type" class="control-label">Type</label>
            <input type="text" class="input form-control" id="type" name="type" placeholder="Chien">
            <span id="type-erreur" class="msg-erreur"></span>
        </div>

        <div class="form-group"> <!-- Race -->
            <label for="race" class="control-label">Race</label>
            <input type="text" class="input form-control" id="race" name="race" placeholder="L&eacute;vrier">
            <span id="race-erreur" class="msg-erreur"></span>
        </div>

        <div class="form-group"> <!-- &acirc;ge -->
            <label for="age" class="control-label">&acirc;ge</label>
            <select class="input form-control" id="age" name="age">
                <option disabled selected value> -- Veuillez choisir un &acirc;ge -- </option>
                <option value="0">0 an</option>
                <option value="1">1 an</option>
                <option value="2">2 ans</option>
                <option value="3">3 ans</option>
                <option value="4">4 ans</option>
                <option value="5">5 ans</option>
                <option value="6">6 ans</option>
                <option value="7">7 ans</option>
                <option value="8">8 ans</option>
                <option value="9">9 ans</option>
                <option value="10">10 ans</option>
                <option value="11">11 ans</option>
                <option value="12">12 ans</option>
                <option value="13">13 ans</option>
                <option value="14">14 ans</option>
                <option value="15">15 ans</option>
                <option value="16">16 ans</option>
                <option value="17">17 ans</option>
                <option value="18">18 ans</option>
                <option value="19">19 ans</option>
                <option value="20">20 ans</option>
                <option value="21">21 ans</option>
                <option value="22">22 ans</option>
                <option value="23">23 ans</option>
                <option value="24">24 ans</option>
                <option value="25">25 ans</option>
                <option value="26">26 ans</option>
                <option value="27">27 ans</option>
                <option value="28">28 ans</option>
                <option value="29">29 ans</option>
                <option value="30">30 ans</option>
            </select>
            <span id="age-erreur" class="msg-erreur"></span>
        </div>

        <div class="form-group"> <!-- Description -->
            <label for="description" class="control-label">Description</label>
            <textarea class="input form-control" name="description" rows="5" id="description"></textarea>
            <span id="description-erreur" class="msg-erreur"></span>
        </div>

        <div class="form-group"> <!-- Courriel -->
            <label for="courriel" class="control-label">Courriel</label>
            <input type="text" class="input form-control" id="courriel" name="courriel"
                   placeholder="votrecourriel@exemple.com">
            <span id="courriel-erreur" class="msg-erreur"></span>
        </div>

        <div class="form-group"> <!-- Adresse -->
            <label for="adresse" class="control-label">Adresse</label>
            <input type="text" class="input form-control" id="adresse" name="adresse" placeholder="1234 rue du refuge">
            <span id="adresse-erreur" class="msg-erreur"></span>
        </div>

        <div class="form-group"> <!-- Ville -->
            <label for="ville" class="control-label">Ville</label>
            <input type="text" class="input form-control" id="ville" name="ville" placeholder="Montr&eacute;al">
            <span id="ville-erreur" class="msg-erreur"></span>
        </div>

        <div class="form-group"> <!-- Zip Code-->
            <label for="cp" class="control-label">Code Postal</label>
            <input type="text" class="input form-control" id="cp" name="cp" placeholder="A1A 1A1">
            <span id="cp-erreur" class="msg-erreur"></span>
        </div>

        <div class="form-group"> <!-- Submit Button -->
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Envoyez</button>
        </div>
    </div>
</form>
<hr class="featurette-divider">

<footer class="container">
    <p class="float-right"><a href="#">Retour en haut</a></p>
    <p>&copy; Samuel K&eacute;roack &middot; KERS15059307 &middot; <a
                href="https://getbootstrap.com/docs/5.0/examples/carousel/">Source Bootstrap</a></p>
</footer>

<!-- end document-->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/global.js"></script>
<script src="../vendor/js/jquery-3.5.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../vendor/js/jquery-3.5.1.slim.min.js"><\/script>')</script>
<script src="../vendor/js/popper.min.js"></script>
<script src="../vendor/js/bootstrap.min.js"></script>

</body>
</html>