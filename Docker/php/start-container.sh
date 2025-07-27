#!/bin/sh

echo ">>> Starting cron..."
cron

echo ">>> Running artisan optimize..."
php artisan optimize

echo ">>> Running npm install..."
npm install

echo ">>> Running npm build..."
npm run build

echo ">>> Running migrate:fresh with seed..."
php artisan migrate:fresh --seed

echo ">>> Starting PHP-FPM..."
php-fpm
