<?php
$parent = "";
$enfant = "";
$ecole = "";
$age = "";
$lundi = 0;
$mardi = 0;
$mercredi = 0;
$jeudi = 0;
$vendredi = 0;
$messageEnfant = "";
$messageParent = "";
$messageEcole = "";
$messageAge = "";
$messageLundi = "";
$messageMardi = "";
$messageMercredi = "";
$messageJeudi = "";
$messageVendredi = "";


if (verifierDonnees()) {

    $parent = $_POST["parent"];
    $enfant = $_POST["enfant"];
    $ecole = $_POST["ecole"];
    $age = intval($_POST["age"]);

    if (isset($_POST["lundi"])) {
        $lundi = $_POST["lundi"];
    } else
        $messageLundi = "Le choix de repas pour lundi est obligatoire.";

    if (isset($_POST["mardi"])) {
        $mardi = $_POST["mardi"];
    } else
        $messageMardi = "Le choix de repas pour mardi est obligatoire.";

    if (isset($_POST["mercredi"])) {
        $mercredi = $_POST["mercredi"];
    } else
        $messageMercredi = "Le choix de repas pour mercredi est obligatoire.";

    if (isset($_POST["jeudi"])) {
        $jeudi = $_POST["jeudi"];
    } else
        $messageJeudi = "Le choix de repas pour jeudi est obligatoire.";

    if (isset($_POST["vendredi"])) {
        $vendredi = $_POST["vendredi"];
    } else
        $messageVendredi = "Le choix de repas pour vendredi est obligatoire.";

    $messageParent = validerNomParent($parent);
    $messageEnfant = validerNomEnfant($enfant);
    $messageEcole = validerNomEcole($ecole);
    $messageAge = validerAge($age);

    if (empty($messageEcole) && empty($messageAge) && empty($messageParent) && empty($messageEnfant) && empty($messageLundi) && empty($messageMardi) && empty($messageMercredi) && empty($messageJeudi) && empty($messageVendredi)) {
        $plats = transformerChoix($lundi, $mardi, $mercredi, $jeudi, $vendredi);
        ecrireCommande($parent, $enfant, $ecole, $age, $plats);
        header("Location: confirmation.php?parent=" . urlencode($parent) . "&enfant=" . urlencode($enfant) . "&ecole=" . urlencode($ecole) . "&age=" . $age . "&lundi=" . urlencode($plats[0]) . "&mardi=" . urlencode($plats[1]) . "&mercredi=" . urlencode($plats[2]) . "&jeudi=" . urlencode($plats[3]) . "&vendredi=" . urlencode($plats[4]), true, 303);
        exit;
    }
}

function validerAge($age)
{
    $messageAge = "";
    if ($age < 4 || $age > 12) {
        $messageAge = "L'&acirc;ge doit se trouver entre 4-12 ans.";
    }
    return $messageAge;
}

function verifierDonnees()
{
    $succes = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST["enfant"])
            || !isset($_POST["ecole"])
            || !isset($_POST["age"])
            || !isset($_POST["parent"])) {
            http_response_code(400);
            exit;
        } else {
            $succes = true;
        }
    }
    return $succes;
}

function validerNomParent($nom)
{
    $messageNom = "";
    if (!empty($nom)) {
        if (strpos($nom, ',') !== false) {
            $messageNom = "Les virgules ne sont pas accept&eacute;es dans le nom.";
        }
    } else
        $messageNom = "Veuillez entrer le nom complet du parent s'il-vous-plait.";
    return $messageNom;
}

function validerNomEcole($nom)
{
    $messageNom = "";
    if (!empty($nom)) {
        if (strpos($nom, ',') !== false) {
            $messageNom = "Les virgules ne sont pas accept&eacute;es dans le nom.";
        }
    } else
        $messageNom = "Veuillez entrer le nom complet de l'&eacute;cole s'il-vous-plait.";
    return $messageNom;

}

function validerNomEnfant($nom)
{
    $messageNom = "";
    if (!empty($nom)) {
        if (strpos($nom, ',') !== false) {
            $messageNom = "Les virgules ne sont pas accept&eacute;es dans le nom.";
        }
    } else
        $messageNom = "Veuillez entrer le nom complet de l'enfant s'il-vous-plait.";
    return $messageNom;
}

function ecrireCommande($parent, $enfant, $ecole, $age, $plats)
{
    $commandes = fopen('../Commandes/Commandes', 'a');

    fwrite($commandes, "Parent:" . $parent . ", Enfant:" .
        $enfant . ", Age:" . $age . ", Ecole:" .
        $ecole . ", Lundi:" . $plats[0] . ", Mardi:" . $plats[1] . ", Mercredi:" . $plats[2] . ", Jeudi:" . $plats[3] . ", Vendredi:" . $plats[4] . "\n");
    fclose($commandes);
}

function transformerChoix($lundi, $mardi, $mercredi, $jeudi, $vendredi)
{
    $plats = array();

    if ($lundi == 1) {
        $plats [0] = "Pizza pepperoni";
    } else {
        $plats [0] = "Lasagne aux légumes";
    }
    if ($mardi == 1) {
        $plats [1] = "Rouleaux de printemps au poulet";
    } else {
        $plats [1] = "Sautée au tofu";
    }
    if ($mercredi == 1) {
        $plats [2] = "Vol-au-vent à la dinde";
    } else {
        $plats [2] = "Saumon aux légumes";
    }
    if ($jeudi == 1) {
        $plats [3] = "Couscous royal";
    } else {
        $plats [3] = "Quesadillas aux épinards";
    }
    if ($vendredi == 1) {
        $plats [4] = "Porc à l'érable";
    } else {
        $plats [4] = "Pâté Chinois";
    }
    return $plats;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande</title>
    <link href="../CSS/styleGeneral.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <table class="logo">
        <tr><td>
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
    <h2>Commande</h2>
    <hr>

<h3>Veuillez remplir tous les champs pour passer une commande</h3>
<form method="post" action="Commande.php">
    <?php if (!empty($messageParent)) echo "<span id='erreur'>{$messageParent}</span><br>" ?>
    <label for="parent">Nom complet du parent : </label><br>
    <?php echo "<input type='text' name='parent' size='50' id='parent' value='{$parent}'>"; ?><br><br>
    <?php if (!empty($messageEnfant)) echo "<span id='erreur'>{$messageEnfant}</span><br>" ?>
    <label for="enfant">Nom complet de l'enfant : </label><br>
    <?php echo "<input id='enfant' name='enfant' size='50' type='text' value='{$enfant}'>"; ?><br><br>
    <?php if (!empty($messageEcole)) echo "<span id='erreur'>{$messageEcole}</span><br>" ?>
    <label for="ecole">Nom de l'&eacute;cole : </label><br>
    <?php echo "<input id='ecole' name='ecole' size='50' type='text' value='{$ecole}'>"; ?> <br><br>
    <?php if (!empty($messageAge)) echo "<span id='erreur'>{$messageAge}</span><br>" ?>
    <label for="age">&acirc;ge de l'enfant : </label>
    <select id="age" name="age">
        <?php
        for ($i = 4; $i < 13; $i++) {
            if ($i == $age) {
                $selected = "selected='selected'";
            } else {
                $selected = "";
            }
            echo "<option value='{$i}' {$selected}>{$i}</option>";
        }
        ?>
    </select>
    <br>
    <div id="plats">
    <ul>
        <li><h4>Lundi (veuillez faire un choix) :</h4>

    <?php if (!empty($messageLundi)) echo "<span id='erreur'>{$messageLundi}</span><br>" ?>
    <figure>
        <img class="plat" alt="pizza" src="../IMG/pizza.png">
        <br>
        <input type="radio" id="lundi-1" name="lundi" value="1" <?php if ($lundi == 1) echo "checked='checked'"; ?>>
        <label for="lundi-1">Choix 1 : Pizza pepperoni<br><br>Ingr&eacute;dients : p&acirc;te pizza, sauce tomate, fromage
            mozzarella, pepperoni</label>
    </figure>
    <figure>
        <img class="plat" alt="lasagne" src="../IMG/lasagne-legumes.jpeg">
        <br>
        <input type="radio" id="lundi-2" name="lundi" value="2" <?php if ($lundi == 2) echo "checked='checked'"; ?>>
        <label for="lundi-2">Choix 2 : Lasagne aux l&eacute;gumes<br><br>Ingr&eacute;dients : p&acirc;te lasagne, sauce
            primavera, fromage mozzarella, courgette, poivron </label>
    </figure>
        <br>
        <li><h4>Mardi (veuillez faire un choix) : </h4>

    <?php if (!empty($messageMardi)) echo "<span id='erreur'>{$messageMardi}</span><br>" ?>
    <figure>
        <img class="plat" alt="rouleaux-printemps" src="../IMG/rouleaux-printemps-poulet.jpg">
        <br>
        <input type="radio" id="mardi-1" name="mardi" value="1" <?php if ($mardi == 1) echo "checked='checked'"; ?>>
        <label for="mardi-1">Choix 1 : Rouleaux de printemps au poulet<br><br>Ingr&eacute;dients : feuille de riz,
            vermicelle de riz, poulet, mangue, carottes, basilic thai </label>
    </figure>
    <figure>
        <img class="plat" alt="saut&eacute;-tofu" src="../IMG/saute-tofu.jpg">
        <br>
        <input type="radio" id="mardi-2" name="mardi" value="2" <?php if ($mardi == 2) echo "checked='checked'"; ?>>
        <label for="mardi-2">Choix 2 : Saut&eacute; au tofu<br><br>Ingr&eacute;dients : tofu, riz blanc, ananas, s&eacute;same,
            poivron rouge, pois mange-tout</label>
    </figure>
        <br>
        <li><h4>Mercredi (veuillez faire un choix) : </h4>
    <?php if (!empty($messageMercredi)) echo "<span id='erreur'>{$messageMercredi}</span><br>"; ?>
    <figure>
        <img class="plat" alt="vol-aux-vents" src="../IMG/vol-aux-vents-dinde.jpg">
        <br>
        <input type="radio" id="mercredi-1" name="mercredi" value="1"
            <?php if ($mercredi == 1) echo "checked='checked'"; ?>>
        <label for="mercredi-1">Choix 1 : Vol-au-vent &agrave; la dinde<br><br>Ingr&eacute;dients : Vol-au-vent, dinde,
            champignon, sauce b&eacute;chamel</label>
    </figure>
    <figure>
        <img class="plat" alt="saumon" src="../IMG/saumon-legumes.jpeg">
        <br>
        <input type="radio" id="mercredi-2" name="mercredi" value="2"
            <?php if ($mercredi == 2) echo "checked='checked'"; ?>>
        <label for="mercredi-2">Choix 2 : Saumon aux l&eacute;gumes<br><br>Ingr&eacute;dients : saumon de l'atlantique,
            oignons verts, moutarde</label>
    </figure>
        <br>
        <li><h4>Jeudi (veuillez faire un choix) : </h4>
    <?php if (!empty($messageJeudi)) echo "<span id='erreur'>{$messageJeudi}</span><br>"; ?>
    <figure>
        <img class="plat" alt="couscous" src="../IMG/couscous-royal.jpg">
        <br>
        <input type="radio" id="jeudi-1" name="jeudi" value="1"
            <?php if ($jeudi == 1) echo "checked='checked'"; ?>>
        <label for="jeudi-1">Choix 1 : Couscous royal<br><br>Ingr&eacute;dients : couscous, poulet, merguez, navet,
            choux, raisins secs</label>
    </figure>
    <figure>
        <img class="plat" alt="quesadillas" src="../IMG/quesadillas-epinards.jpg">
        <br>
        <input type="radio" id="jeudi-2" name="jeudi" value="2" <?php if ($jeudi == 2) echo "checked='checked'"; ?>>
        <label for="jeudi-2">Choix 2 : Quesadillas aux &eacute;pinards<br><br>Ingr&eacute;dients : tortillas, &eacute;pinards,
            tomates, avocats, fromage mozzarella</label>
    </figure>
        <br>
        <li><h4>Vendredi (veuillez faire un choix) : </h4>
    <?php if (!empty($messageVendredi)) echo "<span id='erreur'>{$messageVendredi}</span><br>"; ?>
    <figure>
        <img class="plat" alt="porc" src="../IMG/porc-erable.jpeg">
        <br>
        <input type="radio" id="vendredi-1" name="vendredi" value="1"
            <?php if ($vendredi == 1) echo "checked='checked'"; ?>>
        <label for="vendredi-1">Choix 1 : Porc &agrave; l'&eacute;rable<br><br>Ingr&eacute;dients : porc du Qu&eacute;bec,
            &eacute;rable, choux de bruxelles, pomme cortland</label>
    </figure>
    <figure>
        <img class="plat" alt="pate-chinois" src="../IMG/pate-chinois.jpg">
        <br>
        <input type="radio" id="vendredi-2" name="vendredi" value="2"
            <?php if ($vendredi == 2) echo "checked='checked'"; ?>>
        <label for="vendredi-2">Choix 2 : P&acirc;t&eacute; Chinois<br><br>Ingr&eacute;dients : pomme de terre, maïs en grain,
            boeuf hach&eacute;</label>
    </figure>
    <br>
    <br>
    <input id="bouton" type="submit" value="Commander">
        <br>
        <br><br>
    </div>
</form>
</div>
</body>
</html>