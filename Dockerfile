# Utiliser l'image PHP officielle avec Apache
FROM php:8.2-apache

# Définir les variables d'environnement
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV COMPOSER_ALLOW_SUPERUSER=1

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    libgd-dev \
    libwebp-dev \
    libxpm-dev \
    libvpx-dev \
    libmagickwand-dev \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP nécessaires
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        zip \
        gd \
        intl \
        mbstring \
        xml \
        curl \
        opcache

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurer Apache
RUN a2enmod rewrite
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Créer l'utilisateur www-data avec les bonnes permissions
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de configuration PHP
COPY docker/php.ini /usr/local/etc/php/conf.d/custom.ini
COPY docker/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Créer les répertoires nécessaires et définir les permissions
RUN mkdir -p var/cache var/log public/images/units \
    && chown -R www-data:www-data var public/images \
    && chmod -R 755 var public/images

# Vider le cache et optimiser
RUN php bin/console cache:clear --env=prod \
    && php bin/console cache:warmup --env=prod

# Exposer le port 80
EXPOSE 80

# Script de démarrage
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Définir l'utilisateur
USER www-data

# Commande de démarrage
CMD ["/usr/local/bin/start.sh"] 