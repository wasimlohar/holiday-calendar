FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html/

# Image config
ENV SKIP_COMPOSER 0
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV local
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr



# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Install dependencies
RUN apk update && apk add unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Run composer install
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

CMD ["/start.sh"]
