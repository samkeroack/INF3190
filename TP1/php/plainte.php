<?php
$nom = "";
$prenom = "";
$ville = "";
$courriel = "";
$telephone = "";
$message = "";

if (verificationDonnees()) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $ville = $_POST["ville"];
    $telephone = $_POST["telephone"];
    $courriel = $_POST["courriel"];
    $message = $_POST["message"];
    ecrirePlainte($nom, $prenom, $ville, $telephone, $courriel, $message);
    echo "Merci, nous vous contacterons sous peu.";
    echo "<br>";
    echo "<br>";
    echo "<form action=../Accueil.html>
 <button type=submit> Retour &agrave; l'accueil</button> 
</form>";
} else {
    echo "Veuillez remplir tous les champs s.v.p";
    echo "<br>";
    echo "<br>";
    echo "<form action=../HTML/Plaintes.html>
 <button type=submit>Retour au formulaire</button> 
</form>";
}


function verificationDonnees()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        return isset($_POST["nom"], $_POST["prenom"], $_POST["ville"], $_POST["telephone"], $_POST["courriel"], $_POST["message"])
            && !empty($_POST["nom"])
            && !empty($_POST["prenom"])
            && !empty($_POST["ville"])
            && !empty($_POST["telephone"])
            && !empty($_POST["courriel"])
            && !empty($_POST["message"]);
    }
    return false;
}

function ecrirePlainte($nom, $prenom, $ville, $telephone, $courriel, $message)
{
    $plainte = fopen('../Plainte/plainte.txt', 'a');
    fwrite($plainte, "Nom:" . $nom . ", Prénom:" . $prenom . ", Ville:" . $ville . ", Téléphone:" . $telephone . ", Courriel:" . $courriel . ", Message:" . $message . "\n");
    fclose($plainte);
}

