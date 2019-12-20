build:
	docker build -t prueba/symfony:latest .

run:
	docker run -p 8000:80 -v `pwd`:/var/www --name symfony_prueba prueba/symfony:latest

test:
	phpdbg -qrr ./vendor/bin/simple-phpunit

show-routers:
	php bin/console debug:router

build-entities:
	php bin/console doctrine:mapping:import App\\Entity annotation --path=src/Entity

build-entities-set-get:
	php bin/console make:entity --regenerate App\\Entity

containers:
	php bin/console debug:container

autowiring:
    php bin/console debug:autowiring

service-show:
    php bin/console debug:container 'App\Service\Mailer' --show-arguments
