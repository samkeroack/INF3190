<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Confirmation commande</title>
    <meta charset="utf-8">
    <link href="../CSS/styleGeneral.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <table class="logo">
        <tr>
            <td>
                <img alt="logo" src="../IMG/Logo.png">
            </td>
            <td>
                <h1>Traiteur aux petits oignons</h1>
            </td>
        </tr>
    </table>
    <nav>
        <ul class="menu">
            <li><a href="../Accueil.html">Accueil</a></li>
            <li><a href="../HTML/Informations.html">Informations</a></li>
            <li><a href="Commande.php">Commande</a></li>
            <li><a href="../HTML/Contact.html">Contact</a></li>
        </ul>
        <br>
    </nav>
</header>
<img alt="banniere" id="banner" src="../IMG/banner.jpg">

<div class="contenu">
    <h2>Commande pass&eacute;e avec succ&egrave;s !</h2>
    <hr>
    <p class="horaire"><?php echo "Merci " . $_GET["parent"] . ". La commande au nom de " . $_GET["enfant"] . ", " . $_GET["age"] . " ans &agrave; bien &eacute;t&eacute; reçu."; ?></p>
    <h2>Horaire des repas :</h2>
    <img id="bonappetit" src="../IMG/bon-appetit-tampon-nm.png" alt="bon appetit">
    <p class="horaire"><?php echo "La livraison de la commande se fera &agrave; l'&eacute;cole " . $_GET["ecole"] . "."; ?></p>
    <p class="horaire"><?php echo "<b>Lundi</b> : " . $_GET["lundi"]; ?></p>
    <p class="horaire"><?php echo "<b>Mardi</b> : " . $_GET["mardi"]; ?></p>
    <p class="horaire"><?php echo "<b>Mercredi</b> : " . $_GET["mercredi"]; ?></p>
    <p class="horaire"><?php echo "<b>Jeudi</b> : " . $_GET["jeudi"]; ?></p>
    <p class="horaire"><?php echo "<b>Vendredi</b> : " . $_GET["vendredi"]; ?></p>
</div>
</body>
</html>