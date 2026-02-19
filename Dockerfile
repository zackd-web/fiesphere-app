FROM php:8.4-fpm

# 1. Install dependencies sistem (Gue tambahin libpng dkk buat gambar)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl

# 2. Hapus Postgres, ganti ke MySQL & GD buat urusan gambar
RUN docker-php-ext-install pdo_mysql gd opcache

# 3. Git config biar nggak rewel soal permission di WSL
RUN git config --global --add safe.directory /var/www

# 4. Install Composer (Tetep pake cara pro)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# 5. COPY kodingan lo (Opsional, karena biasanya pake volume)
COPY . .

# 6. SET PERMISSION (WAJIB buat Laravel)
# Biar user www-data punya hak akses ke folder storage
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache