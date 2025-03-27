# Use an official PHP image with Apache (PHP 8.2)
FROM php:8.2-apache

# Set the working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the existing application directory contents
COPY . .

# Increase memory limit and install PHP dependencies with verbose logging
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --verbose

# Expose port 80
EXPOSE 80

# Run Laravel migrations and start the server
CMD php artisan migrate --force && apache2-foreground
