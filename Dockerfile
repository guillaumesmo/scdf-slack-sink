FROM php:alpine

RUN docker-php-ext-install -j$(nproc) bcmath

COPY vendor /src/vendor
COPY run.php /src/

ENTRYPOINT ["php", "/src/run.php"]