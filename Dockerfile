FROM php:8.0-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libzip-dev \
    libicu-dev \
    unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql gd zip intl

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Ensure necessary directories exist and have correct permissions
RUN mkdir -p /var/www/html/uploads/settings \
    /var/www/html/uploads/foto_siswa \
    /var/www/html/uploads/bank_soal \
    /var/www/html/uploads/import \
    /var/www/html/uploads/materi \
    /var/www/html/uploads/tugas \
    /var/www/html/uploads/profiles \
    /var/www/html/uploads/temp \
    /var/www/html/backups && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html/application/cache /var/www/html/application/logs && \
    chmod -R 777 /var/www/html/uploads /var/www/html/backups

# Expose port 80
EXPOSE 80
