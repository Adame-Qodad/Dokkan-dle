# 🐳 Docker pour Dokkan'dle

Ce guide explique comment déployer Dokkan'dle avec Docker et Docker Compose.

## 📋 Prérequis

- Docker 20.10+
- Docker Compose 2.0+
- Au moins 2GB de RAM disponible
- 5GB d'espace disque libre

## 🚀 Déploiement Rapide

### 1. Cloner le projet
```bash
git clone https://github.com/votre-username/dokkan-dle.git
cd dokkan-dle
```

### 2. Configuration de base
```bash
# Copier le fichier d'environnement
cp .env.example .env

# Éditer les variables d'environnement
nano .env
```

### 3. Démarrage avec Docker Compose
```bash
# Construire et démarrer tous les services
docker-compose up -d

# Voir les logs
docker-compose logs -f dokkan-dle
```

### 4. Accès à l'application
- **Application** : http://localhost:8080
- **Base de données** : localhost:3306
- **Redis** : localhost:6379

## 🛠️ Configuration Avancée

### Variables d'environnement

Créer un fichier `.env` avec les variables suivantes :

```env
# Application
APP_ENV=prod
APP_DEBUG=0
APP_SECRET=votre_secret_ici

# Base de données
DATABASE_URL=mysql://dokkan_user:dokkan_password@mysql:3306/dokkan_dle

# Cache Redis (optionnel)
REDIS_URL=redis://redis:6379

# Sécurité
CLEAR_CACHE=false
```

### Services Disponibles

#### Application Dokkan'dle
- **Port** : 8080
- **Image** : Construite localement
- **Volumes** : Données, images, logs

#### Base de données MySQL
- **Port** : 3306
- **Image** : mysql:8.0
- **Base de données** : dokkan_dle
- **Utilisateur** : dokkan_user
- **Mot de passe** : dokkan_password

#### Cache Redis
- **Port** : 6379
- **Image** : redis:7-alpine
- **Persistance** : Volume Docker

#### Reverse Proxy Nginx
- **Port** : 80 (HTTP), 443 (HTTPS)
- **Image** : nginx:alpine
- **SSL** : Configuration optionnelle

## 🔧 Commandes Utiles

### Gestion des conteneurs
```bash
# Démarrer tous les services
docker-compose up -d

# Arrêter tous les services
docker-compose down

# Redémarrer un service spécifique
docker-compose restart dokkan-dle

# Voir les logs en temps réel
docker-compose logs -f dokkan-dle

# Accéder au conteneur
docker-compose exec dokkan-dle bash
```

### Maintenance
```bash
# Vider le cache
docker-compose exec dokkan-dle php bin/console cache:clear

# Mettre à jour les dépendances
docker-compose exec dokkan-dle composer install

# Vérifier la configuration
docker-compose exec dokkan-dle php bin/console debug:config
```

### Sauvegarde et restauration
```bash
# Sauvegarder la base de données
docker-compose exec mysql mysqldump -u root -p dokkan_dle > backup.sql

# Restaurer la base de données
docker-compose exec -T mysql mysql -u root -p dokkan_dle < backup.sql

# Sauvegarder les volumes
docker run --rm -v dokkan-dle_dokkan_data:/data -v $(pwd):/backup alpine tar czf /backup/data_backup.tar.gz -C /data .
```

## 🔒 Sécurité

### Configuration HTTPS

1. **Générer les certificats SSL**
```bash
mkdir -p docker/nginx/ssl
openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout docker/nginx/ssl/key.pem \
    -out docker/nginx/ssl/cert.pem
```

2. **Activer HTTPS dans docker-compose.yml**
```yaml
nginx:
  ports:
    - "80:80"
    - "443:443"
```

### Headers de sécurité

Les headers de sécurité suivants sont configurés dans Nginx :
- `X-Frame-Options: SAMEORIGIN`
- `X-XSS-Protection: 1; mode=block`
- `X-Content-Type-Options: nosniff`
- `Strict-Transport-Security` (HTTPS uniquement)

## 📊 Monitoring

### Logs
```bash
# Logs de l'application
docker-compose logs dokkan-dle

# Logs de la base de données
docker-compose logs mysql

# Logs de Nginx
docker-compose logs nginx
```

### Métriques
```bash
# Utilisation des ressources
docker stats

# Espace disque des volumes
docker system df -v
```

## 🚨 Dépannage

### Problèmes courants

#### L'application ne démarre pas
```bash
# Vérifier les logs
docker-compose logs dokkan-dle

# Vérifier les permissions
docker-compose exec dokkan-dle ls -la var/
```

#### Erreur de base de données
```bash
# Vérifier la connexion
docker-compose exec dokkan-dle php bin/console doctrine:database:create

# Réinitialiser la base de données
docker-compose down -v
docker-compose up -d
```

#### Problème de cache
```bash
# Vider le cache
docker-compose exec dokkan-dle php bin/console cache:clear

# Réchauffer le cache
docker-compose exec dokkan-dle php bin/console cache:warmup
```

### Performance

#### Optimisations recommandées
1. **Augmenter la mémoire PHP** : Modifier `docker/php.ini`
2. **Activer OPcache** : Déjà configuré
3. **Utiliser Redis** : Configurer dans `config/packages/cache.yaml`
4. **Optimiser les images** : Compression et cache

## 🔄 Mise à jour

### Mise à jour de l'application
```bash
# Arrêter les services
docker-compose down

# Récupérer les dernières modifications
git pull

# Reconstruire l'image
docker-compose build --no-cache

# Redémarrer les services
docker-compose up -d
```

### Mise à jour des dépendances
```bash
# Mettre à jour Composer
docker-compose exec dokkan-dle composer update

# Vider le cache
docker-compose exec dokkan-dle php bin/console cache:clear
```

## 📝 Notes de développement

### Mode développement
Pour le développement, modifier `docker-compose.yml` :
```yaml
environment:
  - APP_ENV=dev
  - APP_DEBUG=1
```

### Debugging
```bash
# Accéder au conteneur en mode interactif
docker-compose exec dokkan-dle bash

# Vérifier la configuration PHP
docker-compose exec dokkan-dle php -i

# Tester la connexion à la base de données
docker-compose exec dokkan-dle php bin/console doctrine:query:sql "SELECT 1"
```

---

🐉 **Dokkan'dle** - Puissance maximale avec Docker ! ⚡ 