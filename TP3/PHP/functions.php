<?php
function parseCsv($filename): array
{
    $animaux = [];
    if (($stream = fopen("{$filename}", "r")) !== FALSE) {
        fgetcsv($stream);
        while (($ligne = fgetcsv($stream)) !== FALSE) {
            if ($ligne[0] != null || $ligne[0] != "") {
                $animaux[] = $ligne;
            }
        }
        fclose($stream);
    }
    return $animaux;
}

function animauxAleatoire(): array
{
    global $animaux;
    $animauxRand = array();
    shuffle($animaux);
    for ($i = 0; $i < 5; $i++) {
        if (array_key_exists($i, $animaux) && $animaux[$i] != null) {
            $animauxRand[$i] = $animaux[$i];
        }
    }
    return $animauxRand;
}

function imprimerResultats($array)
{
    echo "<div class='row'>\n";
    for ($i = 0; $i < count($array); $i++) {
        echo "<div  class='fiche col-lg-4 rounded border border-success text-center'>";
        echo "<h2>Nom : {$array[$i][1]}</h2>\n";
        echo "<p>Description : {$array[$i][5]}</p>\n";
        $animal = "animal.php?id=" . urlencode($array[$i][0]) . "&nom=" . urlencode($array[$i][1]) . "&type=" . urlencode($array[$i][2]) . "&race=" . urlencode($array[$i][3]) . "&age=" . urlencode($array[$i][4]) . "&description=" . urlencode($array[$i][5]) . "&courriel=" . urlencode($array[$i][6]) . "&adresse=" . urlencode($array[$i][7]) . "&ville=" . urlencode($array[$i][8]) . "&cp=" . urlencode($array[$i][9]);
        echo "<p><a class='justify-content-end btn btn-outline-success my-2 my-sm-0' href=$animal role='button'>Fiche animal &raquo;</a></p>";
        echo "</div>";
        echo "<div class='col-lg-1'></div>";

    }
    echo "</div>";
}

function imprimerFiches($array)
{
    echo "<div class='row'>\n";
    for ($i = 0; $i < count($array); $i++) {
        echo "<a href='mailto:{$array[$i][6]}' class='ficheanimal border-success col-lg-3 rounded border text-center'>\n";
        echo "<h2>Nom : {$array[$i][1]}</h2>\n";
        echo "<p>Type : {$array[$i][2]}</p>\n";
        echo "<p>Race : {$array[$i][3]}</p>\n";
        echo "<p>&Acirc;ge : {$array[$i][4]}";
        if ($array[$i][4] > 1) echo ' ans'; else echo ' an';
        echo '<br></p>';
        echo "<p>Description : {$array[$i][5]}</p>\n";
        echo "<p>Courriel : {$array[$i][6]}</p>\n";
        echo "<p>Adresse : {$array[$i][7]}</p>\n";
        echo "<p>Ville : {$array[$i][8]}</p>\n";
        echo "<p>Code Postal : {$array[$i][9]}</p>\n";
        echo "</a>";
    }
    echo "</div>";
}

function rechercher($keyword, $filename): array
{
    $resultats = [];
    if ($keyword != "" || $keyword != null) {
        if (($stream = fopen($filename, "r")) !== FALSE) {
            fgetcsv($stream);
            while (($ligne = fgetcsv($stream)) !== FALSE) {
                foreach ($ligne as $key) {
                    if (strpos(strtolower($key), $keyword) !== false) {
                        if (!in_array($ligne, $resultats)) {
                            $resultats[] = $ligne;
                        }
                    }
                }
            }
            fclose($stream);
        }
    }
    return $resultats;
}


function verifierDonnees(): bool
{
    $succes = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST["nom"])
            || !isset($_POST["type"])
            || !isset($_POST["race"])
            || !isset($_POST["age"])
            || !isset($_POST["description"])
            || !isset($_POST["courriel"])
            || !isset($_POST["adresse"])
            || !isset($_POST["cp"])) {
            http_response_code(400);
            exit;
        } else {
            $succes = true;
        }
    }
    return $succes;
}

function getLastId()
{
    global $animaux;
    $lastline = $animaux[count($animaux) - 1];
    return $lastline[0];
}

function generateId(): string
{
    global $id;
    $id = "X" . strval(intval(substr($id, 1)) + 1);
    return $id;
}

function writeCsv($filename, $nom, $type, $race, $age, $description, $courriel, $adresse, $ville, $cp)
{
    ini_set("auto_detect_line_endings", true);
    $id = generateId();
    $animaux = [$id, $nom, $type, $race, $age, $description, $courriel, $adresse, $ville, $cp];
    $fichier = fopen($filename, "a");
    fputcsv($fichier, $animaux);
    fclose($fichier);
}