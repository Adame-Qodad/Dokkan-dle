<?php

// Script pour extraire tous les titres uniques du fichier JSON

// Lire le fichier JSON
$jsonFile = 'public/data/units.json';
$jsonContent = file_get_contents($jsonFile);
$units = json_decode($jsonContent, true);

if ($units === null) {
    die("Erreur lors du décodage du JSON\n");
}

echo "Analyse du fichier JSON...\n";

// Extraire tous les titres uniques
$titles = [];
foreach ($units as $unit) {
    if (isset($unit['title']) && !empty($unit['title'])) {
        $titles[$unit['title']] = true;
    }
}

$uniqueTitles = array_keys($titles);
sort($uniqueTitles);

echo "Nombre de titres uniques trouvés : " . count($uniqueTitles) . "\n\n";

echo "=== TITRES UNIQUES ===\n";
foreach ($uniqueTitles as $index => $title) {
    echo ($index + 1) . ". \"$title\"\n";
}

echo "\n=== FORMAT POUR LE SCRIPT DE TRADUCTION ===\n";
foreach ($uniqueTitles as $title) {
    echo "    '$title' => '', // À traduire\n";
}

// Sauvegarder la liste dans un fichier
file_put_contents('titles_list.txt', implode("\n", $uniqueTitles));
echo "\nListe des titres sauvegardée dans 'titles_list.txt'\n"; 