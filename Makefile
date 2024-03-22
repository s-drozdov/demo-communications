SHELL := /bin/bash

## Setup project from docker app container
.PHONY: docker-setup
docker-setup: create-env \
              create-db-config \
              build \
              up \
              composer-install \
              yii-migrate

## Building images
.PHONY: build
build:
	docker compose build --build-arg PUID=$$(id -u) --build-arg PGID=$$(id -g)

## Running containers
.PHONY: up
up:
	docker compose up -d
	
## Stopping containers
.PHONY: down
down:
	docker compose down

## Stopping containers
.PHONY: stop
stop:
	docker compose stop

## Prepare ENV
.PHONY: create-env 
create-env:
	{ \
        cp .env.example .env; \
        echo -n "Please input password for new database:"; \
        read DB_PASSWORD; \
        echo "DB_PASSWORD=$${DB_PASSWORD}" >> .env; \
	}

## Prepare config/db.php
.PHONY: create-db-config
create-db-config:
	{ \
	    cp ./config/db.php.example ./config/db.php; \
        source .env; \
        sed -i "s/@APP_NAME@/$$APP_NAME/" ./config/db.php; \
        sed -i "s/@DB_DATABASE@/$$DB_DATABASE/" ./config/db.php; \
        sed -i "s/@DB_USERNAME@/$$DB_USERNAME/" ./config/db.php; \
        sed -i "s/@DB_PASSWORD@/$$DB_PASSWORD/" ./config/db.php; \
	}

## run composer from host
.PHONY: composer-install
composer-install:
	{ \
        source .env; \
        docker exec $${APP_NAME}_app composer install; \
	}

## run migrations from host
.PHONY: yii-migrate
yii-migrate:
	{ \
        source .env; \
        docker exec $${APP_NAME}_app php yii migrate --interactive=0; \
	}
