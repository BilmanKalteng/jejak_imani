FROM php:8.3-fpm


RUN apt-get update && apt-get install -y \
    git curl unzip libzip-dev libpq-dev cron libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip xml opcache

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm


COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


WORKDIR /var/www


COPY php/laravel-cron /etc/cron.d/laravel-cron


RUN chmod 0644 /etc/cron.d/laravel-cron


RUN crontab /etc/cron.d/laravel-cron


RUN touch /var/log/cron.log


COPY php/start-container.sh /start-container.sh
RUN chmod +x /start-container.sh


EXPOSE 9000

CMD ["/start-container.sh"]

