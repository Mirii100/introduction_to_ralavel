FROM php:8.3-apache

# Install system dependencies
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

# Set Apache document root to Laravel public folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public


# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm

# Copy and build frontend assets
COPY package*.json ./
RUN npm install
COPY resources resources
COPY vite.config.js vite.config.js
RUN npm run build


# Update Apache config to use the new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy Composer binary from official Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy only composer files first to leverage Docker cache
COPY composer.json composer.lock ./

# Install PHP dependencies without running scripts
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Copy the rest of the application
COPY . .

# Ensure Laravel directory is marked safe for git
RUN git config --global --add safe.directory /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Run Laravel optimization & setup commands
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force || true

# Expose port 80
EXPOSE 80

# Start Laravel app and Apache
CMD ["sh", "-c", "php artisan migrate --force && apache2-foreground"]
