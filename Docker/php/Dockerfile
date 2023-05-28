FROM php:8-apache

ENV ACCEPT_EULA=Y

RUN a2enmod rewrite

# Install system dependencies
RUN DEBIAN_FRONTEND=noninteractive apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libxslt-dev \
    gnupg \
    zsh \
    apt-transport-https

# Microsoft SQL Server Prerequisites
RUN DEBIAN_FRONTEND=noninteractive apt-get update \
    && curl https://packages.sury.org/php/apt.gpg \
            > /etc/apt/trusted.gpg.d/php.gpg \
    && curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/debian/11/prod.list \
        > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get install -y --no-install-recommends \
        locales \
        apt-transport-https \
    && echo "fr_FR.UTF-8 UTF-8" > /etc/locale.gen \
    && locale-gen \
    && apt-get update \
    && apt-get -y --no-install-recommends install \
        unixodbc-dev \
        msodbcsql18


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install mbstring exif pcntl bcmath gd xsl \
&& pecl install sqlsrv pdo_sqlsrv \
&& docker-php-ext-enable sqlsrv pdo_sqlsrv

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app
