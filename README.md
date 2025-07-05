# 🐉 Dokkan'dle

Une application web moderne et interactive pour explorer l'univers de **Dragon Ball Z: Dokkan Battle**. Découvrez tous les personnages, leurs statistiques, compétences et plus encore dans une interface élégante et responsive.

![Dokkan'dle Preview](https://img.shields.io/badge/Status-Active-brightgreen)
![PHP Version](https://img.shields.io/badge/PHP-8.1+-blue)
![Symfony Version](https://img.shields.io/badge/Symfony-6.0+-orange)
![License](https://img.shields.io/badge/License-MIT-green)

## ✨ Fonctionnalités

### 🎯 Fonctionnalités Principales
- **📋 Base de données complète** : Plus de 1000 personnages de Dragon Ball Z: Dokkan Battle
- **🔍 Recherche avancée** : Filtrage par nom, rareté, type et plus
- **🎲 Personnage du jour** : Découverte aléatoire quotidienne
- **🌍 Interface multilingue** : Français et Anglais
- **📱 Design responsive** : Optimisé pour tous les appareils

### 🎨 Interface Moderne
- **Design sombre élégant** avec thème Dragon Ball
- **Animations fluides** et effets visuels
- **Navigation intuitive** avec icônes FontAwesome
- **Cartes interactives** avec effets de survol
- **Gradients et ombres** pour un rendu premium

### 📊 Informations Détaillées
- **Statistiques complètes** : PV, Attaque, Défense
- **Catégories et liens** des personnages
- **Compétences passives et actives**
- **Attaques spéciales** avec descriptions
- **Images haute qualité** des personnages

## 🚀 Installation

### Prérequis
- PHP 8.1 ou supérieur
- Composer
- Serveur web (Apache/Nginx)

### Étapes d'installation

1. **Cloner le repository**
```bash
git clone https://github.com/votre-username/dokkan-dle.git
cd dokkan-dle
```

2. **Installer les dépendances**
```bash
composer install
```

3. **Configurer l'environnement**
```bash
cp .env.example .env
# Éditer .env avec vos paramètres de base de données
```

4. **Créer la base de données**
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

5. **Importer les données**
```bash
# Télécharger les images des personnages
php bin/console app:download-unit-images

# Extraire les titres pour traduction
php extract_titles.php

# Traduire les données (optionnel)
php translate_json.php
```

6. **Démarrer le serveur**
```bash
php -S localhost:8000 -t public
```

## 🎮 Utilisation

### Navigation
- **Accueil** : Vue d'ensemble avec statistiques et fonctionnalités
- **Liste des personnages** : Parcourir et filtrer tous les personnages
- **Personnage du jour** : Découvrir un personnage aléatoire

### Filtres Disponibles
- **Recherche par nom** : Recherche textuelle
- **Filtre par rareté** : LR, UR, SSR, SR, R, N
- **Filtre par type** : AGL, TEQ, INT, STR, PHY
- **Tri** : Par nom ou rareté

### Affichage
- **Vue grille** : Cartes compactes avec images
- **Vue liste** : Informations détaillées en liste
- **Responsive** : Adaptation automatique sur mobile

## 🛠️ Architecture

### Structure du Projet
```
dokkan-dle/
├── src/
│   ├── Controller/          # Contrôleurs Symfony
│   ├── Service/             # Services métier
│   └── EventListener/       # Écouteurs d'événements
├── templates/               # Templates Twig
├── public/
│   ├── data/               # Fichiers JSON des données
│   └── images/             # Images des personnages
├── config/                 # Configuration Symfony
└── bin/                    # Commandes console
```

### Technologies Utilisées
- **Backend** : Symfony 6.x, PHP 8.1+
- **Frontend** : Twig, CSS3, JavaScript ES6+
- **Design** : CSS Grid, Flexbox, Animations CSS
- **Icônes** : FontAwesome 6
- **Polices** : Orbitron, Roboto (Google Fonts)

## 🎨 Design System

### Palette de Couleurs
```css
--primary-color: #ff6b35;      /* Orange Dragon Ball */
--secondary-color: #f7931e;    /* Orange secondaire */
--accent-color: #ffd700;       /* Or accent */
--dark-bg: #1a1a2e;           /* Fond sombre */
--card-bg: #16213e;           /* Fond des cartes */
```

### Composants
- **Cartes** : Bordures arrondies, ombres, effets de survol
- **Boutons** : Gradients, animations, états interactifs
- **Navigation** : Barre sticky, backdrop blur
- **Formulaires** : Champs stylisés, focus states

## 🌍 Internationalisation

### Langues Supportées
- 🇫🇷 **Français** (par défaut)
- 🇺🇸 **Anglais**

### Système de Traduction
- Fichiers de traduction PHP
- Service de traduction Symfony
- Basculement dynamique en session
- Traduction des données JSON

## 📱 Responsive Design

### Breakpoints
- **Desktop** : 1200px+
- **Tablet** : 768px - 1199px
- **Mobile** : < 768px

### Adaptations
- Navigation en hamburger sur mobile
- Grille adaptative pour les cartes
- Images redimensionnées
- Boutons et formulaires optimisés

## 🔧 Commandes Console

### Commandes Disponibles
```bash
# Télécharger les images des personnages
php bin/console app:download-unit-images

# Extraire les données Dokkan
php bin/console app:dokkan-fetch

# Vider le cache
php bin/console cache:clear
```

## 📊 Données

### Sources
- **API Dokkan Battle** : Données des personnages
- **Images** : Téléchargement automatique
- **Traductions** : Système de traduction personnalisé

### Structure JSON
```json
{
  "id": "11000",
  "name": "Goku",
  "title": "Super Saiyan",
  "rarity": "UR",
  "type": "AGL",
  "hp": 15000,
  "attack": 12000,
  "defense": 8000,
  "categories": ["Saiyan", "Super Saiyan"],
  "links": ["Kamehameha", "Super Saiyan"],
  "passiveSkill": "...",
  "superAttack": "..."
}
```

## 🚀 Déploiement

### Production
1. Configurer l'environnement de production
2. Optimiser les assets (CSS/JS minification)
3. Configurer le serveur web
4. Mettre en place un CDN pour les images

### Recommandations
- **Serveur** : Apache/Nginx avec PHP-FPM
- **Base de données** : MySQL 8.0+ ou PostgreSQL
- **Cache** : Redis ou Memcached
- **CDN** : Cloudflare ou AWS CloudFront

## 🤝 Contribution

### Comment Contribuer
1. Fork le projet
2. Créer une branche feature (`git checkout -b feature/AmazingFeature`)
3. Commit les changements (`git commit -m 'Add AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

### Standards de Code
- PSR-12 pour PHP
- ESLint pour JavaScript
- Prettier pour le formatage
- Tests unitaires pour les nouvelles fonctionnalités

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 🙏 Remerciements

- **Bandai Namco** pour Dragon Ball Z: Dokkan Battle
- **Symfony** pour le framework PHP
- **FontAwesome** pour les icônes
- **Google Fonts** pour les polices

## 📞 Support

- **Issues** : [GitHub Issues](https://github.com/votre-username/dokkan-dle/issues)
- **Discussions** : [GitHub Discussions](https://github.com/votre-username/dokkan-dle/discussions)
- **Email** : support@dokkan-dle.com

---

<div align="center">
  <p>Fait avec ❤️ par la communauté Dragon Ball</p>
  <p>⚡ Puissance maximale ! ⚡</p>
</div> 