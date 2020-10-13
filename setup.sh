#!/bin/bash

echo Changing ownership of storage and bootstrap/cache directories to $USER

sudo chown -R $USER:www-data user-management/storage/ user-management/bootstrap/cache
chmod -R 775 user-management/storage/ user-management/bootstrap/cache

echo Building the docker image
docker build -t usermanagement .

# cd docker

# docker-compose run --rm --no-deps web bash -c "composer install; npm install; php artisan key:generate;"