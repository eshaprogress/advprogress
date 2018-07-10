#!/usr/bin/env bash
cp ./env-laradock ./laradock/.env
chmod 777 ./bootstrap ./storage -R
cp ./env-laravel ./.env
cd ./laradock
docker-compose up -d nginx mysql
cd ./laradock/
docker-compose exec workspace bash