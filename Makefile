build:
	docker build -t prueba/symfony:latest .

run:
	docker run -p 8000:80 -v `pwd`:/var/www prueba/symfony:latest

show-routers:
	php bin/console debug:router