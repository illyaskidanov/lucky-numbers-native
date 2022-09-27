build:
	docker run --rm -it --volume ${PWD}:/app --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp composer install \
	&& docker-compose build
run:
	docker-compose up -d
stop:
	docker-compose stop
test:
	docker-compose exec -it php sh -c "php vendor/bin/codecept run"
phpstan:
	docker-compose exec -it php sh -c "php vendor/bin/phpstan analyse src tests"