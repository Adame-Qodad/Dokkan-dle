# Dokkan'dle

Une application web pour explorer les personnages de Dragon Ball Z: Dokkan Battle.

## Fonctionnalités

- **Liste des personnages** : Parcourir tous les personnages avec filtres et recherche
- **Personnage du jour** : Découvrir un personnage aléatoire chaque jour
- **Détails complets** : Informations détaillées sur chaque personnage
- **Interface responsive** : Design adaptatif pour mobile et desktop

## Installation

### Prérequis

- PHP 8.2 ou supérieur
- Composer
- Serveur web (Apache/Nginx) ou serveur de développement Symfony

### Étapes d'installation

1. Cloner le repository :
```bash
git clone <repository-url>
cd dokkan-dle
```

2. Installer les dépendances :
```bash
composer install
```

3. Configurer les permissions :
```bash
chmod -R 777 var/
```

4. Lancer le serveur de développement :
```bash
php bin/console server:start
```

5. Ouvrir votre navigateur à l'adresse : `http://localhost:8000`

## Structure du projet

```
dokkan-dle/
├── src/
│   ├── Controller/
│   │   ├── HomeController.php      # Page d'accueil
│   │   ├── UnitsController.php     # Liste et détails des personnages
│   │   └── UnitController.php      # Personnage du jour
│   └── Command/                    # Commandes console
├── templates/
│   ├── base.html.twig             # Template de base
│   ├── home/
│   │   └── index.html.twig        # Page d'accueil
│   └── units/
│       ├── list.html.twig         # Liste des personnages
│       └── show.html.twig         # Détails d'un personnage
├── public/
│   ├── data/
│   │   └── units.json             # Base de données des personnages
│   └── images/
│       ├── units/                 # Images des personnages
│       └── fallback.png           # Image par défaut
└── config/                        # Configuration Symfony
```

## Utilisation

### Navigation

- **Accueil** (`/`) : Page d'accueil avec présentation des fonctionnalités
- **Liste des personnages** (`/units`) : Parcourir et filtrer les personnages
- **Personnage du jour** (`/unit-of-the-day`) : Personnage aléatoire
- **Détails d'un personnage** (`/unit/{id}`) : Informations complètes

### Filtres disponibles

- **Recherche par nom** : Recherche textuelle dans les noms
- **Filtre par rareté** : UR, LR, SSR, SR, R, N
- **Filtre par type** : AGL, TEQ, INT, STR, PHY
- **Tri** : Par nom ou par rareté

## Technologies utilisées

- **Symfony 7.3** : Framework PHP
- **Twig** : Moteur de templates
- **CSS3** : Styles et design responsive
- **JavaScript** : Interactions côté client

## Développement

### Ajouter un nouveau personnage

1. Ajouter les données dans `public/data/units.json`
2. Ajouter l'image correspondante dans `public/images/units/`
3. Mettre à jour le champ `localImagePath` dans le JSON

### Commandes utiles

```bash
# Vider le cache
php bin/console cache:clear

# Lister les routes
php bin/console debug:router

# Vérifier la configuration
php bin/console debug:config
```

## Licence

Ce projet est sous licence propriétaire.

## Contribution

Les contributions sont les bienvenues ! N'hésitez pas à :

1. Signaler des bugs
2. Proposer des améliorations
3. Soumettre des pull requests

## Support

Pour toute question ou problème, veuillez ouvrir une issue sur le repository. 