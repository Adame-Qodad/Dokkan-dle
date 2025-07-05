# Makefile pour Dokkan'dle
# Commandes utiles pour le développement et le déploiement

.PHONY: help build up down restart logs shell clean backup restore dev prod

# Variables
COMPOSE_FILE = docker-compose.yml
SERVICE_NAME = dokkan-dle

# Aide
help: ## Afficher cette aide
	@echo "🐉 Dokkan'dle - Commandes disponibles:"
	@echo ""
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

# Construction et déploiement
build: ## Construire l'image Docker
	docker-compose build --no-cache

up: ## Démarrer tous les services
	docker-compose up -d

down: ## Arrêter tous les services
	docker-compose down

restart: ## Redémarrer tous les services
	docker-compose restart

# Logs et monitoring
logs: ## Afficher les logs de l'application
	docker-compose logs -f $(SERVICE_NAME)

logs-all: ## Afficher les logs de tous les services
	docker-compose logs -f

# Accès aux conteneurs
shell: ## Accéder au shell du conteneur principal
	docker-compose exec $(SERVICE_NAME) bash

shell-mysql: ## Accéder au shell MySQL
	docker-compose exec mysql mysql -u root -p

shell-nginx: ## Accéder au shell Nginx
	docker-compose exec nginx sh

# Maintenance
clean: ## Nettoyer les conteneurs et volumes non utilisés
	docker-compose down -v
	docker system prune -f

cache-clear: ## Vider le cache Symfony
	docker-compose exec $(SERVICE_NAME) php bin/console cache:clear

cache-warmup: ## Réchauffer le cache Symfony
	docker-compose exec $(SERVICE_NAME) php bin/console cache:warmup

composer-install: ## Installer les dépendances Composer
	docker-compose exec $(SERVICE_NAME) composer install

composer-update: ## Mettre à jour les dépendances Composer
	docker-compose exec $(SERVICE_NAME) composer update

# Sauvegarde et restauration
backup: ## Sauvegarder la base de données
	@echo "💾 Sauvegarde de la base de données..."
	docker-compose exec mysql mysqldump -u root -p dokkan_dle > backup_$(shell date +%Y%m%d_%H%M%S).sql
	@echo "✅ Sauvegarde terminée"

restore: ## Restaurer la base de données (utiliser: make restore FILE=backup.sql)
	@if [ -z "$(FILE)" ]; then \
		echo "❌ Spécifiez le fichier de sauvegarde: make restore FILE=backup.sql"; \
		exit 1; \
	fi
	@echo "🔄 Restauration de la base de données..."
	docker-compose exec -T mysql mysql -u root -p dokkan_dle < $(FILE)
	@echo "✅ Restauration terminée"

# Environnements
dev: ## Démarrer en mode développement
	@echo "🔧 Mode développement"
	docker-compose -f $(COMPOSE_FILE) up -d
	docker-compose exec $(SERVICE_NAME) php bin/console cache:clear --env=dev

prod: ## Démarrer en mode production
	@echo "🚀 Mode production"
	docker-compose -f $(COMPOSE_FILE) up -d
	docker-compose exec $(SERVICE_NAME) php bin/console cache:clear --env=prod
	docker-compose exec $(SERVICE_NAME) php bin/console cache:warmup --env=prod

# Tests et vérifications
test: ## Exécuter les tests
	docker-compose exec $(SERVICE_NAME) php bin/phpunit

check: ## Vérifier la configuration
	docker-compose exec $(SERVICE_NAME) php bin/console debug:config

status: ## Afficher le statut des services
	docker-compose ps

# SSL et sécurité
ssl-generate: ## Générer les certificats SSL auto-signés
	@echo "🔐 Génération des certificats SSL..."
	mkdir -p docker/nginx/ssl
	openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
		-keyout docker/nginx/ssl/key.pem \
		-out docker/nginx/ssl/cert.pem \
		-subj "/C=FR/ST=France/L=Paris/O=Dokkan'dle/CN=localhost"
	@echo "✅ Certificats SSL générés"

# Performance
optimize: ## Optimiser l'application
	@echo "⚡ Optimisation de l'application..."
	docker-compose exec $(SERVICE_NAME) composer install --optimize-autoloader --no-dev
	docker-compose exec $(SERVICE_NAME) php bin/console cache:clear --env=prod
	docker-compose exec $(SERVICE_NAME) php bin/console cache:warmup --env=prod
	@echo "✅ Optimisation terminée"

# Déploiement complet
deploy: build up optimize ## Déployer l'application complète
	@echo "🎉 Déploiement terminé !"
	@echo "🌐 Application disponible sur: http://localhost:8080"

# Nettoyage complet
clean-all: down ## Nettoyage complet (conteneurs, images, volumes)
	docker-compose down -v --rmi all
	docker system prune -af --volumes

# Commandes rapides
quick-start: up logs ## Démarrage rapide avec logs
	@echo "🚀 Démarrage rapide terminé"

quick-stop: down ## Arrêt rapide
	@echo "🛑 Arrêt rapide terminé"

# Informations système
info: ## Afficher les informations système
	@echo "🐉 Informations Dokkan'dle:"
	@echo "📦 Version Docker: $(shell docker --version)"
	@echo "🔧 Version Docker Compose: $(shell docker-compose --version)"
	@echo "📊 Espace disque:"
	docker system df
	@echo "🖥️  Utilisation mémoire:"
	docker stats --no-stream --format "table {{.Container}}\t{{.CPUPerc}}\t{{.MemUsage}}"

# Commandes de développement
watch-logs: ## Surveiller les logs en temps réel
	@echo "👀 Surveillance des logs (Ctrl+C pour arrêter)..."
	docker-compose logs -f --tail=100

reload: restart cache-clear ## Recharger l'application (redémarrage + cache)
	@echo "🔄 Rechargement terminé"

# Commandes de base de données
db-create: ## Créer la base de données
	docker-compose exec $(SERVICE_NAME) php bin/console doctrine:database:create

db-drop: ## Supprimer la base de données
	docker-compose exec $(SERVICE_NAME) php bin/console doctrine:database:drop --force

db-reset: db-drop db-create ## Réinitialiser la base de données
	@echo "🔄 Base de données réinitialisée"

# Commandes d'images
images-download: ## Télécharger les images des personnages
	docker-compose exec $(SERVICE_NAME) php bin/console app:download-unit-images

# Aide contextuelle
docker-help: ## Aide Docker
	@echo "🐳 Commandes Docker utiles:"
	@echo "  make build     - Construire l'image"
	@echo "  make up        - Démarrer les services"
	@echo "  make down      - Arrêter les services"
	@echo "  make logs      - Voir les logs"
	@echo "  make shell     - Accéder au conteneur"
	@echo "  make clean     - Nettoyer"
	@echo "  make deploy    - Déploiement complet"

# Version et informations
version: ## Afficher la version
	@echo "🐉 Dokkan'dle v1.0.0"
	@echo "📅 $(shell date)"
	@echo "🔧 Makefile v1.0"

# Commandes par défaut
.DEFAULT_GOAL := help 