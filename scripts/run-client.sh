#!/usr/bin/env sh

if [[ "$APP_ENV" = "production" ]]; then
    NUXT_HOST=0.0.0.0 NUXT_PORT=3000 yarn start
else
    NUXT_HOST=0.0.0.0 NUXT_PORT=3000 yarn dev
fi;
