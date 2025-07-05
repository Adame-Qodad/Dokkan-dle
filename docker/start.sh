#!/bin/bash

# Script de démarrage pour Dokkan'dle
set -e

echo "🐉 Démarrage de Dokkan'dle..."

# Vérifier que les répertoires nécessaires existent
mkdir -p var/cache var/log public/images/units

# Définir les permissions
chown -R www-data:www-data var public/images
chmod -R 755 var public/images

# Vider le cache si nécessaire
if [ "$CLEAR_CACHE" = "true" ]; then
    echo "🧹 Nettoyage du cache..."
    php bin/console cache:clear --env=prod
fi

# Réchauffer le cache
echo "🔥 Réchauffage du cache..."
php bin/console cache:warmup --env=prod

# Vérifier la configuration
echo "⚙️ Vérification de la configuration..."
php bin/console debug:config --env=prod

# Démarrer Apache en premier plan
echo "🚀 Démarrage d'Apache..."
exec apache2-foreground 