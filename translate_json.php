<?php

// Script de traduction du fichier JSON
// Traduit les champs principaux en français en respectant le contexte Dragon Ball

// Dictionnaire de traduction
$translations = [
    // Titres - Traductions plus appropriées
    'A New Life on Vampa' => 'Une nouvelle vie sur Vampa',
    'A Promise Made to Kakarot' => 'Une promesse faite à Kakarot',
    'All or Nothing' => 'Tout ou rien',
    'Alternate Ending' => 'Fin alternative',
    'Apex of Supreme Saiyan Power' => 'Apogée du pouvoir saiyan suprême',
    'Awakened Saiyan Blood' => 'Sang saiyan éveillé',
    'Awakened Super Hero' => 'Super héros éveillé',
    
    // Classes - Garder les termes du jeu
    'Super' => 'Super',
    'Extreme' => 'Extrême',
    
    // Raretés - Garder les abréviations
    'LR' => 'LR',
    'UR' => 'UR',
    'SSR' => 'SSR',
    'SR' => 'SR',
    'R' => 'R',
    'N' => 'N',
    
    // Types - Garder les abréviations
    'AGL' => 'AGL',
    'TEQ' => 'TEQ',
    'INT' => 'INT',
    'STR' => 'STR',
    'PHY' => 'PHY',
    
    // Liens - Traductions appropriées respectant le contexte Dragon Ball
    'Brainiacs' => 'Cerveaux',
    'Solid Support' => 'Soutien solide',
    'Cold Judgment' => 'Jugement froid',
    'Big Bad Bosses' => 'Gros méchants boss',
    'Shocking Speed' => 'Vitesse choquante',
    'Fierce Battle' => 'Combat féroce',
    'Legendary Power' => 'Pouvoir légendaire',
    'Saiyan Warrior Race' => 'Race guerrière saiyan',
    'Prodigies' => 'Prodiges',
    'Super Saiyan' => 'Super Saiyan',
    'Royal Lineage' => 'Lignée royale',
    'Golden Warrior' => 'Guerrier doré',
    'Warrior Gods' => 'Dieux guerriers',
    'Prepared for Battle' => 'Prêt pour le combat',
    'Power Bestowed by God' => 'Pouvoir accordé par Dieu',
    'Fused Fighter' => 'Combattant fusionné',
    'Shattering the Limit' => 'Briser la limite',
    'Messenger from the Future' => 'Messager du futur',
    'Dismal Future' => 'Avenir sombre',
    'Kamehameha' => 'Kamehameha',
    'GT' => 'GT',
    'All in the Family' => 'Toute la famille',
    'Infighter' => 'Combattant rapproché',
    'Saiyan Roar' => 'Rugissement saiyan',
    
    // Catégories - Traductions respectant le contexte Dragon Ball
    'Movie Bosses' => 'Boss de films',
    'Joined Forces' => 'Forces unies',
    'Bond of Friendship' => 'Lien d\'amitié',
    'Resurrected Warriors' => 'Guerriers ressuscités',
    'Majin Buu Saga' => 'Saga Majin Buu',
    'Pure Saiyans' => 'Saiyans purs',
    'Vegeta\'s Family' => 'Famille de Vegeta',
    'Worthy Rivals' => 'Rivaux dignes',
    'Otherworld Warriors' => 'Guerriers de l\'autre monde',
    'Super Saiyan 2' => 'Super Saiyan 2',
    'All-Out Struggle' => 'Lutte totale',
    'Connected Hope' => 'Espoir connecté',
    'Gifted Warriors' => 'Guerriers doués',
    'Time Limit' => 'Limite de temps',
    'Mastered Evolution' => 'Évolution maîtrisée',
    'Battle of Fate' => 'Bataille du destin',
    'Power Beyond Super Saiyan' => 'Pouvoir au-delà du Super Saiyan',
    'Bond of Parent and Child' => 'Lien parent-enfant',
    'Realm of Gods' => 'Royaume des dieux',
    'Potara' => 'Potara',
    'Future Saga' => 'Saga Future',
    'Time Travelers' => 'Voyageurs temporels',
    'Final Trump Card' => 'Atout final',
    'Battle of Wits' => 'Bataille d\'esprit',
    'Accelerated Battle' => 'Bataille accélérée',
    'Fused Fighters' => 'Combattants fusionnés',
    'Super Heroes' => 'Super héros',
    'Hybrid Saiyans' => 'Saiyans hybrides',
    'Androids/Cell Saga' => 'Saga Androïdes/Cell',
    'Bond of Master and Disciple' => 'Lien maître-disciple',
    'Revenge' => 'Vengeance',
    'Warriors Raised on Earth' => 'Guerriers élevés sur Terre',
    'Shadow Dragon Saga' => 'Saga Dragon de l\'ombre',
    'Goku\'s Family' => 'Famille de Goku',
    'Giant Ape Power' => 'Pouvoir du singe géant',
    'Turtle School' => 'École de la tortue',
    'GT Heroes' => 'Héros GT',
    'Full Power' => 'Pleine puissance',
    'Transformation Boost' => 'Boost de transformation',
    'Movie Heroes' => 'Héros de films',
    'Siblings\' Bond' => 'Lien fraternel',
    'Exploding Rage' => 'Rage explosive',
    'Miraculous Awakening' => 'Éveil miraculeux',
    'Final Trump Card' => 'Atout final',
    'Battle of Wits' => 'Bataille d\'esprit',
    'Time Limit' => 'Limite de temps',
    'Accelerated Battle' => 'Bataille accélérée',
    'Battle of Fate' => 'Bataille du destin',
    'Power Beyond Super Saiyan' => 'Pouvoir au-delà du Super Saiyan',
    'Fused Fighters' => 'Combattants fusionnés',
    'Super Heroes' => 'Super héros',
    
    // Compétences - Traductions techniques appropriées
    'Ki +4 and HP, ATK & DEF +130%' => 'Ki +4 et PV, ATK & DEF +130%',
    'Ki +4 and HP, ATK & DEF +100%' => 'Ki +4 et PV, ATK & DEF +100%',
    'Ki +3 and HP, ATK & DEF +70%' => 'Ki +3 et PV, ATK & DEF +70%',
    'causes colossal damage' => 'inflige des dégâts colossaux',
    'causes mega-colossal damage' => 'inflige des dégâts méga-colossaux',
    'causes ultimate damage' => 'inflige des dégâts ultimes',
    'raises DEF for 1 turn' => 'augmente DEF pendant 1 tour',
    'raises ATK & DEF' => 'augmente ATK & DEF',
    'Greatly raises ATK & DEF for 1 turn' => 'Augmente grandement ATK & DEF pendant 1 tour',
    'Massively raises ATK & DEF for 1 turn' => 'Augmente massivement ATK & DEF pendant 1 tour',
    'Greatly raises ATK for 1 turn' => 'Augmente grandement ATK pendant 1 tour',
    'Massively raises ATK temporarily' => 'Augmente massivement ATK temporairement',
    'lowers ATK' => 'diminue ATK',
    'lowers DEF' => 'diminue DEF',
    'lowers ATK & DEF' => 'diminue ATK & DEF',
    'ATK & DEF +' => 'ATK & DEF +',
    'Ki +' => 'Ki +',
    'HP +' => 'PV +',
    'DEF +' => 'DEF +',
    'ATK +' => 'ATK +',
    'per Ki Sphere obtained' => 'par sphère Ki obtenue',
    'enemy' => 'ennemi',
    'allies' => 'alliés',
    'Super Attack' => 'Attaque spéciale',
    'Ultra Super Attack' => 'Ultra attaque spéciale',
    'Passive' => 'Passif',
    'Leader Skill' => 'Compétence de leader',
    'Active Skill' => 'Compétence active',
    'Can be activated' => 'Peut être activé',
    'starting from the' => 'à partir du',
    'turn from the start of battle' => 'tour depuis le début du combat',
    'once only' => 'une seule fois',
    'when facing' => 'quand on affronte',
    'or more enemies' => 'ennemis ou plus',
    'when there is' => 'quand il y a',
    'Category ally' => 'allié de catégorie',
    'attacking in the same turn' => 'attaquant dans le même tour',
    'whose name includes' => 'dont le nom inclut',
    'medium chance' => 'chance moyenne',
    'high chance' => 'forte chance',
    'great chance' => 'très forte chance',
    'rare chance' => 'chance rare',
    'of becoming a' => 'de devenir une',
    'additional attack' => 'attaque supplémentaire',
    'launches an additional attack' => 'lance une attaque supplémentaire',
    'evades enemy\'s attack' => 'esquive l\'attaque ennemie',
    'including Super Attack' => 'y compris l\'attaque spéciale',
    'with 7 or more Ki Spheres obtained' => 'avec 7 sphères Ki ou plus obtenues',
    'the less HP remaining, the greater the Ki boost' => 'moins il reste de PV, plus le boost Ki est important',
    'up to' => 'jusqu\'à',
    'each time Ki rises by 1' => 'chaque fois que le Ki augmente de 1',
    'Youth, Captain Ginyu, Jr., etc. excluded' => 'Jeunesse, Capitaine Ginyu, Jr., etc. exclus',
    'for 1 turn' => 'pendant 1 tour',
    'for the rest of battle' => 'pour le reste du combat',
    'after delivering a final blow' => 'après avoir porté un coup final',
    'when performing a' => 'quand on effectue une',
    'when Ki is' => 'quand le Ki est',
    'or more' => 'ou plus',
    'disables enemy\'s guard' => 'désactive la garde ennemie',
    'disables the attacked enemy\'s action' => 'désactive l\'action de l\'ennemi attaqué',
    'once within the turn' => 'une fois dans le tour',
    'when facing 2 or more enemies' => 'quand on affronte 2 ennemis ou plus',
    'when activating the Active Skill' => 'quand on active la compétence active',
    'when performing a Super Attack' => 'quand on effectue une attaque spéciale',
    'when Ki is 24' => 'quand le Ki est 24',
    'disables enemy\'s action' => 'désactive l\'action ennemie',
    'when all allies attacking in the same turn are' => 'quand tous les alliés attaquant dans le même tour sont',
    'Category characters' => 'personnages de catégorie',
    'or when facing only 1 enemy' => 'ou quand on affronte seulement 1 ennemi',
    'starting from the 6th turn' => 'à partir du 6ème tour',
    'attacks effective against all Types' => 'attaques efficaces contre tous les types',
    'high chance of nullifying Ki Blast Super Attacks' => 'forte chance d\'annuler les attaques spéciales Ki Blast',
    'directed at the character' => 'dirigées vers le personnage',
    'Greatly raises ATK and raises DEF for 1 turn' => 'Augmente grandement ATK et augmente DEF pendant 1 tour',
    'with a medium chance of stunning the enemy' => 'avec une chance moyenne d\'étourdir l\'ennemi',
    'Activates the Entrance Animation' => 'Active l\'animation d\'entrée',
    'and guards all attacks for 3 turns' => 'et bloque toutes les attaques pendant 3 tours',
    'from start of turn' => 'depuis le début du tour',
    'when there is another' => 'quand il y a un autre',
    'Category ally on the team' => 'allié de catégorie dans l\'équipe',
    'at start of character\'s attacking turn' => 'au début du tour d\'attaque du personnage',
    'plus an additional' => 'plus un supplémentaire',
    'with each Super Attack performed' => 'avec chaque attaque spéciale effectuée',
    'that has a great chance of becoming a Super Attack' => 'qui a une très forte chance de devenir une attaque spéciale',
    'when Ki is 20 or more' => 'quand le Ki est 20 ou plus',
    'Ki Multiplier is' => 'Multiplicateur Ki est',
    'raises SA Multiplier by an additional' => 'augmente le multiplicateur SA d\'un supplémentaire',
    'SA Lv.20' => 'SA Nv.20',
    'KiMeter' => 'Compteur Ki',
    'Green LR' => 'Vert LR',
    
    // Termes techniques - Garder les abréviations importantes
    'baseHP' => 'PV de base',
    'maxLevelHP' => 'PV niveau max',
    'freeDupeHP' => 'PV dupe gratuit',
    'rainbowHP' => 'PV arc-en-ciel',
    'baseAttack' => 'ATK de base',
    'maxLevelAttack' => 'ATK niveau max',
    'freeDupeAttack' => 'ATK dupe gratuit',
    'rainbowAttack' => 'ATK arc-en-ciel',
    'baseDefence' => 'DEF de base',
    'maxDefence' => 'DEF niveau max',
    'freeDupeDefence' => 'DEF dupe gratuit',
    'rainbowDefence' => 'DEF arc-en-ciel',
    'kiMultiplier' => 'multiplicateur Ki',
    'transformations' => 'transformations',
    'localImagePath' => 'cheminImageLocale',
    'imageURL' => 'urlImage',
    'id' => 'id',
    'cost' => 'coût',
    'maxLevel' => 'niveauMax',
    'maxSALevel' => 'niveauSAMax',
    'title' => 'titre',
    'name' => 'nom',
    'rarity' => 'rareté',
    'class' => 'classe',
    'type' => 'type',
    'leaderSkill' => 'compétenceLeader',
    'superAttack' => 'attaqueSpéciale',
    'ultraSuperAttack' => 'ultraAttaqueSpéciale',
    'passive' => 'passif',
    'activeSkill' => 'compétenceActive',
    'activeSkillCondition' => 'conditionCompétenceActive',
    'ezaLeaderSkill' => 'compétenceLeaderEZA',
    'ezaSuperAttack' => 'attaqueSpécialeEZA',
    'ezaUltraSuperAttack' => 'ultraAttaqueSpécialeEZA',
    'ezaPassive' => 'passifEZA',
    'ezaActiveSkill' => 'compétenceActiveEZA',
    'ezaActiveSkillCondition' => 'conditionCompétenceActiveEZA',
    'links' => 'liens',
    'categories' => 'catégories',
    'kiMeter' => 'compteurKi'
];

function translateValue($value, $translations) {
    if (is_string($value)) {
        // Traduire les phrases complètes
        foreach ($translations as $english => $french) {
            $value = str_replace($english, $french, $value);
        }
        return $value;
    } elseif (is_array($value)) {
        // Traduire les éléments d'un tableau
        $translated = [];
        foreach ($value as $item) {
            $translated[] = translateValue($item, $translations);
        }
        return $translated;
    }
    return $value;
}

function translateUnit($unit, $translations) {
    $translated = [];
    
    // Traduire les champs principaux
    $fieldsToTranslate = [
        'title', 'leaderSkill', 'superAttack', 'ultraSuperAttack', 
        'passive', 'activeSkill', 'activeSkillCondition',
        'ezaLeaderSkill', 'ezaSuperAttack', 'ezaUltraSuperAttack',
        'ezaPassive', 'ezaActiveSkill', 'ezaActiveSkillCondition',
        'links', 'categories', 'kiMultiplier'
    ];
    
    foreach ($unit as $key => $value) {
        if (in_array($key, $fieldsToTranslate)) {
            $translated[$key] = translateValue($value, $translations);
        } else {
            $translated[$key] = $value;
        }
    }
    
    return $translated;
}

// Lire le fichier JSON original
$jsonFile = 'public/data/units.json';
$jsonContent = file_get_contents($jsonFile);
$units = json_decode($jsonContent, true);

if ($units === null) {
    die("Erreur lors du décodage du JSON\n");
}

echo "Début de la traduction de " . count($units) . " personnages...\n";
echo "Traduction respectant le contexte Dragon Ball et les catégories du jeu...\n";

// Traduire chaque unité
$translatedUnits = [];
foreach ($units as $index => $unit) {
    $translatedUnits[] = translateUnit($unit, $translations);
    
    if (($index + 1) % 100 === 0) {
        echo "Traduit " . ($index + 1) . " personnages...\n";
    }
}

// Sauvegarder le fichier traduit
$translatedJson = json_encode($translatedUnits, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('public/data/units_fr.json', $translatedJson);

echo "Traduction terminée ! Fichier sauvegardé dans public/data/units_fr.json\n";
echo "Nombre de personnages traduits : " . count($translatedUnits) . "\n";
echo "Traduction respectant le contexte Dragon Ball et les catégories du jeu.\n"; 