#!/bin/bash

# Install PHP
apt-get update
apt-get install -y php libapache2-mod-php php-cli php-mbstring php-xml php-zip php-mysql unzip curl git

# Install Composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Install Node.js
apt-get install -y nodejs npm

# Install PHP dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader

# Install Node.js dependencies
npm install
npm run build
