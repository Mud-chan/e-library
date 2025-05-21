FROM php:8.2-fpm

# Instal dependensi
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    nodejs \
    npm

# Hapus cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install ekstensi
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-install gd

# Instal ekstensi
RUN pecl install redis && docker-php-ext-enable redis

# Instal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Mengatur lokasi tujuan
WORKDIR /var/www/html

# mneyalin konten aplikasi ke dalam lokasi tujuan
COPY . /var/www/html

# Install dependensi
RUN composer install --no-interaction --no-dev --prefer-dist

# copy .env.example ke env jika env tidak ada
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# buat aplicattion key jika belum dibuat
RUN php artisan key:generate --force

# atur permission
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/storage

# expose port
EXPOSE 9000

# start php-fpm server
CMD ["php-fpm"]
