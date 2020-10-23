<?php
include '../HTML/listeCours.html';
afficherTab();

function afficherTab(){
    $listeCours = lireFichier();
    $donneesTraitees = traitements($listeCours);

    echo "<table>";
    afficherEntete();
    afficherCorps($donneesTraitees);
    echo "</table>";

    $nbCours = count($donneesTraitees);

    echo "Il y a ".$nbCours." cour(s) dans le tableau.";

}

function traitements($listeCours){
    $tabDonnees = array();

    foreach ($listeCours as $cours){
        $annee = substr($cours,0,4);
        $trimestre = substr($cours,4,1);
        $sigle = substr($cours,6,7);
        $groupe = substr($cours,14,2);
        $titre = substr($cours,17);

        $trimestre = formatTexte($trimestre);

        array_push($tabDonnees, array($sigle,$groupe,$annee,$trimestre,$titre));
    }

    return $tabDonnees;
}
function formatTexte($trimestre){
    switch ($trimestre){
        case "1": $trimestre = "Hiver";
        break;
        case "2": $trimestre = "Été";
        break;
        case "3": $trimestre = "Automne";
        break;
    }
    return $trimestre;
}
function afficherCorps($donneesTraitees){
    echo "<tbody>";
    foreach ($donneesTraitees as $donnees){
        echo "<tr>";
        foreach ($donnees as $donnee){
            echo "<td>";
            echo $donnee;
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
}

function afficherEntete(){
    $entete = array("Sigle", "Groupe", "Année", "Trimestre", "Titre");
    echo "<thead>";
    echo "<tr>";

    foreach ($entete as $titreRangee){
        echo "<th>";
        echo $titreRangee;
        echo "</th>";
    }
    echo "</tr>";
    echo "</thead>";
}

function lireFichier(){
    return file("../Static/cours.txt");
}

?>