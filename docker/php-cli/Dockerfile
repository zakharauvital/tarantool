FROM php:cli-alpine3.18

RUN apk add --update --no-cache \
    tzdata \
    bash \
    curl \
    zip \
    git \
    shadow \
    ca-certificates \
    && groupmod -o -g 1000 www-data && usermod -o -u 1000 -g www-data www-data \
    && apk del --no-network shadow \
;

COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer
COPY --from=mlocati/php-extension-installer:2.1.35 /usr/bin/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions redis

COPY --chown=www-data app /var/www/html

COPY --chown=www-data docker/php-cli/entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh \
    && chown www-data:www-data /var/www/html \
    ;

WORKDIR /var/www/html

ENTRYPOINT ["/entrypoint.sh"]

CMD ["sh", "-c", "tail -f /dev/null"]