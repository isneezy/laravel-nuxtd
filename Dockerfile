FROM php:7.2-fpm-alpine

RUN addgroup -g 1000 -S docklify && \
    adduser -S -u 1000 docklify -G docklify

RUN apk add --no-cache supervisor inotify-tools yarn nginx

RUN docker-php-ext-install pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure nginx and make sure files/folders needed by the processes are accessable when they run under the docklify user
COPY nginx.conf /etc/nginx/nginx.conf
RUN chown -R docklify.docklify /run && \
  chown -R docklify.docklify /var/lib/nginx && \
  chown -R docklify.docklify /var/tmp/nginx && \
  chown -R docklify.docklify /var/log/nginx

# Switch to use a non-root user from here on
WORKDIR /app
RUN chown -R docklify:docklify .
USER docklify

# Install application dependencies
COPY --chown=docklify:docklify composer.json .
COPY --chown=docklify:docklify composer.lock .
RUN composer check-platform-reqs
RUN composer install --no-autoloader --ignore-platform-reqs --no-suggest --ansi --no-interaction --no-progress

COPY --chown=docklify:docklify package.json .
COPY --chown=docklify:docklify yarn.lock .
RUN yarn install

COPY --chown=docklify:docklify . .
RUN composer dump-autoload
RUN yarn build

EXPOSE 8080
CMD ["supervisord", "--nodaemon", "--configuration", "/app/supervisord.conf"]

# Configure a healthcheck to validate that everything is up&running
HEALTHCHECK --timeout=10s CMD curl --silent --fail http://127.0.0.1:8080/api
