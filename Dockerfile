FROM php:7.2-alpine

RUN addgroup -g 1000 -S docklify && \
    adduser -S -u 1000 docklify -G docklify
USER docklify

WORKDIR /app

USER root
RUN apk add --no-cache supervisor inotify-tools yarn
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install application dependencies
RUN chown -R docklify .
USER docklify
COPY --chown=docklify:docklify composer.json .
COPY --chown=docklify:docklify composer.lock .
RUN composer check-platform-reqs
RUN composer install --no-autoloader --ignore-platform-reqs --no-suggest --ansi --no-interaction --no-progress

COPY --chown=docklify:docklify package.json .
COPY --chown=docklify:docklify yarn.lock .
RUN yarn install

CMD ["supervisord", "--nodaemon", "--configuration", "/app/supervisord.conf"]

COPY --chown=docklify:docklify . .
RUN composer dump-autoload
