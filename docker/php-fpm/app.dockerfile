FROM php:7.4-fpm

# Make sure we are starting with a clean slate
RUN rm -rf /var/lib/apt/lists/* && rm -rf /etc/apt/sources.list.d/*
RUN apt-get clean
RUN apt-get update -o Acquire::CompressionTypes::Order::=gz

# Install dependencies
RUN apt-get update && apt-get install -y mariadb-client libmagickwand-dev libmemcached-dev wget curl build-essential \
  zip unzip libzip-dev vim nano dialog net-tools make git curl autoconf libgsasl-dev libtool g++ grep gnupg --no-install-recommends \
  && pecl channel-update pecl.php.net \
  && pecl install memcached \
  && pecl install imagick \
  && pecl install zip \
  && docker-php-ext-enable memcached \
  && docker-php-ext-enable imagick \
  && docker-php-ext-enable zip

RUN docker-php-ext-install mysqli pdo pdo_mysql tokenizer xml gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

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