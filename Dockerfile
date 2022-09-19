FROM php:7.2-apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
RUN a2enmod rewrite \
    && a2enmod headers
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y libfreetype6-dev \
    && apt-get install -y libjpeg62-turbo-dev \
    && apt-get install -y libpng-dev \
    && apt-get install -y libwebp-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-jpeg --with-webp --with-freetype \
    ; docker-php-ext-install -j$(nproc) zip gd \
    && service apache2 restart