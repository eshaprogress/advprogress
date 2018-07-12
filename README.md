# Pre-requisites
--------------------------

 please make sure that http services are not running on your local machine, if so, locate the local nginx/apache service and stop the daemon

# Setup code-base
--------------------------
- `chmod +x ./install-env.sh && ./install-env.sh`

## Install Procedures
--------------------------

- `chmod +x ./install-init.sh && ./install-init.sh`
- once `install-init.sh` completes, it will take you to a bash prompt, run the following inside:
  - `composer install`
  - `artisan key:generate`
  - `yarn install`
  - `npm run dev`

## Server
--------------------------

(IMPORTANT) This expects that you configure your servers independently with the only important service running on this instance with php/nginx, redis, mysql, memcache are expected to be running elsewhere.

- `sudo cp ./etc/docker-compose-app.service /etc/systemd/system/docker-compose-app.service`
- `sudo systemctl enable docker-compose-app`

### Workflow, Dev Post Install
--------------------------

- 1st thing after machine reboots
  - `source ./install-aliases.sh`
  - `docker-advancedprogress-start` or `docker-advancedprogress-stop`
- Updating code
  - `source ./install-aliases.sh`
  - `git pull`
  - `docker-advancedprogress-workspace`
  - `yarn install`
  - `composer install`
  - `npm run dev` or `npm run watch` for watch listener

### Troubleshooting
--------------------------
- sometimes you're in trouble, and things just break, you may need to rebuild your images
  - `docker-compose down`
  - `docker-compose build --no-cache nginx mysql phpmyadmin workspace php-fpm`
  - purge all docker images
    - docker stop $(docker ps -a -q)
    - docker rm $(docker ps -a -q)
    - docker rmi $(docker images -q)

#### Stripe Debugging
=======================
- Stripe debugging: https://stripe.com/docs/testing
 - Has a list of Testing CC Values
 - Using v2 JS API for front-end integration
 - Make sure you're not in debug mode when using your specific public/secret keys