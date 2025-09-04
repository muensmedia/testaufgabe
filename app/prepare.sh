#!/bin/bash
composer install
ln -s .env.local .env || true
php artisan migrate
php artisan serve --port 80
