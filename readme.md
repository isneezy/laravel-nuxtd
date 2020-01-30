- git clone git@github.com:isneezy/laravel-nuxtd.git
- cp .env.example .env
- composer install
- yarn install
- docker-compose up

- open another terminal
- docker-compose exec app php artisan migrate
- docker-compose exec app php artisan timoneiro:admin your@email.com --create to create an admin account

It will serve your app in http://localhost and api at http://localhost/api

All the mails a trapped with mailhog at http://localhost:8025

Happy codding
