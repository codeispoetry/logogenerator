up:
	docker-compose up -d

stop:
	docker-compose stop

restart:
	docker-compose stop
	docker-compose up -d

build:
	docker-compose up --build -d

install:
	docker-compose run grunt sh -c 'npm install'

grunt-shell:
	docker-compose exec grunt bash

compile:
	docker-compose exec grunt grunt build

log:
	docker-compose logs --tail=20 -f 2>&1 | grep "grunt"

shell:
	docker-compose exec webserver bash

down:
	docker-compose down

deploy:
	rsync -avhz --exclude log/log.txt --exclude tmp ./code/dist/ sharepic:/var/www/vhosts/sharepicgenerator.de/logo.sharepicgenerator.de --delete
