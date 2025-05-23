FROM php:8.3-apache

# Install dependencies including pdo_pgsql
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    zip \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libsqlite3-dev \
    libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Install dependencies (including PostgreSQL support)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Continue with Composer and Laravel setup
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN apt-get update && apt-get install -y php8.3-pgsql
RUN php -v
RUN apt-get update \
    && apt-get install -y --no-install-recommends apt-utils \
    && apt-get install -y php8.3-pgsql \
    && rm -rf /var/lib/apt/lists/*


RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN git config --global --add safe.directory /var/www/html

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
