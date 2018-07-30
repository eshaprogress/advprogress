#!/bin/bash

# Artisan commands
/app/.heroku/php/bin/php /app/artisan clear-compiled
/app/.heroku/php/bin/php /app/artisan view:clear
/app/.heroku/php/bin/php /app/artisan route:cache
/app/.heroku/php/bin/php /app/artisan config:cache
/app/.heroku/php/bin/php /app/artisan install:js:conf
/app/.heroku/php/bin/php /app/artisan migrate

# Boot up!
vendor/bin/heroku-php-nginx -C heroku.nginx.conf public/