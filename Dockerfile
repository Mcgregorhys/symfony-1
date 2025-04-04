FROM php:8.3-fpm

# Ustawienie katalogu roboczego
WORKDIR /app

# Argumenty dla użytkownika
ARG USER_ID=1000
ARG GROUP_ID=1000

# Utwórz użytkownika i grupę (ważna zmiana!)
RUN set -xe; \
    groupadd -g ${GROUP_ID} appuser || true; \
    useradd -u ${USER_ID} -g appuser -d /app appuser || true; \
    mkdir -p /app && \
    chown -R appuser:appuser /app

# Instalacja zależności systemowych
RUN apt-get update && apt-get install -y \
    unzip git curl libpq-dev libonig-dev libzip-dev \
    libicu-dev libxml2-dev zlib1g-dev libpng-dev \
    libjpeg-dev libfreetype6-dev g++ zip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql zip intl opcache && \
    rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    rm -rf /var/lib/apt/lists/*

# Uprawnienia
RUN mkdir -p /app/var /app/public /app/.npm && \
    chown -R appuser:appuser /app

# Przełącz na użytkownika appuser
USER appuser

CMD ["php-fpm"]