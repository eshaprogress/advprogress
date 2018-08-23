#!/bin/bash
export APP_NAME="advprog"
export DOCKER_APP="laradock"
export DOCKER_FOLDER="${PWD}/${DOCKER_APP}/"
alias docker-${APP_NAME}="cd ${DOCKER_FOLDER}"
alias docker-${APP_NAME}-workspace="docker-${APP_NAME} && docker-compose exec workspace bash"
alias docker-${APP_NAME}-start="docker-${APP_NAME} && docker-compose up -d nginx mysql && cd ${PWD}"
alias docker-${APP_NAME}-stop="docker-${APP_NAME} && docker-compose down"
alias docker-${APP_NAME}-restart="docker-${APP_NAME}-stop && docker-${APP_NAME}-start"
