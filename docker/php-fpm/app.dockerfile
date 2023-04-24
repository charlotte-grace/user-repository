FROM php:7.4-fpm

# Make sure we are starting with a clean slate
RUN rm -rf /var/lib/apt/lists/* && rm -rf /etc/apt/sources.list.d/*
RUN apt-get clean
RUN apt-get update -o Acquire::CompressionTypes::Order::=gz

# Install dependencies
RUN apt-get install -y \
    python \
    python-dev \
    apt-utils \
    build-essential \
    curl \
    git \
    grep \
    libgnutls30 \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libmagickwand-dev  \
    libmemcached-dev \
    mariadb-client \
    nano \
    net-tools \
    make \
    unzip \
    wget

# Install PHP extensions
RUN docker-php-ext-install -j$(nproc) mysqli pdo pdo_mysql tokenizer xml gd pcntl zip \
  && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/

# Install pecl extensions
RUN pecl channel-update pecl.php.net \
  && pecl install memcached \
  && pecl install imagick-beta \
  && docker-php-ext-enable memcached \
  && docker-php-ext-enable imagick

# Set the PYTHON environment variable
ENV PYTHON /usr/bin/python3

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and NPM
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

RUN apt-get clean && apt-get autoremove
RUN rm -rf /var/lib/apt/lists/*
RUN apt-get update -o Acquire::CompressionTypes::Order::=gz
RUN rm -rf /tmp/*

# ARG app_user
ARG APP_USER
ENV APP_USER $APP_USER
RUN groupadd -g 1000 "$APP_USER" \
    && useradd -u 1000 -ms /bin/bash -g "${APP_USER}" "${APP_USER}"

# Change current user to local user
USER ${APP_USER}

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]