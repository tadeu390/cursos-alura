.PHONY: up

up-node-mongo:
	docker-compose -f docker-compose-node-mongo.yml up
up-nginx-mysql:
	docker-compose -f docker-compose-nginx-mysql.yml up
up-apache2-mysql:
	docker-compose -f docker-compose-apache2-mysql.yml up

.PHONY: down

down-node-mongo:
	docker-compose -f docker-compose-node-mongo.yml down
down-nginx-mysql:
	docker-compose -f docker-compose-nginx-mysql.yml down
down-apache2-mysql:
	docker-compose -f docker-compose-apache2-mysql.yml down

.PHONY: logs

logs:
	docker-compose logs -f
