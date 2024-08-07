#!/bin/bash
php artisan migrate
php artisan fetch:holidays
# Start Laravel server
php artisan serve --host 0.0.0.0 --port 8080
