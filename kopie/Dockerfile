# Używamy PHP 8.3 + FPM
FROM php:8.3-fpm

# Ustawienie katalogu roboczego
WORKDIR /app

# Instalacja wymaganych pakietów systemowych
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    libicu-dev \
    libxml2-dev \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    g++ \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip intl opcache \
    && rm -rf /var/lib/apt/lists/*

# Instalacja Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalacja Node.js i NPM do Webpack Encore
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    rm -rf /var/lib/apt/lists/*

# Kopiowanie aplikacji do kontenera
COPY . .

# Ustawienia praw do katalogów Symfony
RUN mkdir -p /app/var && chown -R www-data:www-data /app/var && chmod -R 777 /app/var
RUN chown -R www-data:www-data /app && chmod -R 777 /app

# Uruchamianie PHP-FPM
CMD ["php-fpm"]