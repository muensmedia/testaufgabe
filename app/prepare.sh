#!/bin/bash
composer install
ln -s .env.local .env || true
npm i
npm run prod
php artisan migrate
php artisan serve --port 80
