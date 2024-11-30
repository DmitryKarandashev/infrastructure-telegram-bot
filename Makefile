# Имя контейнера PHP берется из переменной PROJECT_NAME
PHP_CONTAINER = $(shell grep PROJECT_NAME .env | cut -d '=' -f2)-php
NGINX_HOST = $(shell grep NGINX_HOST .env | cut -d '=' -f2)

# Цель по умолчанию
.DEFAULT_GOAL := start

# Инициализация проекта: копирование конфигурационных файлов
init:
	@echo "Initializing project..."
	cp -n .env.dist .env || echo ".env already exists, skipping..."
	cp -n docker-compose.yml.dist docker-compose.yml || echo "docker-compose.yml already exists, skipping..."
# Добавление хоста в /etc/hosts
add-host:
	@echo "Adding NGINX_HOST to /etc/hosts..."
	@if ! grep -q "$(NGINX_HOST)" /etc/hosts; then \
		echo "127.0.0.1 $(NGINX_HOST)" | sudo tee -a /etc/hosts > /dev/null; \
		echo "$(NGINX_HOST) added to /etc/hosts"; \
	else \
		echo "$(NGINX_HOST) already exists in /etc/hosts, skipping..."; \
	fi

# Сборка контейнеров
build:
	@echo "Building Docker containers..."
	docker compose build

# Запуск контейнеров
up:
	@echo "Starting Docker containers..."
	docker compose up -d

# Выполнение команды composer install внутри PHP контейнера
composer-install:
	@echo "Running composer install in PHP container..."
	docker exec -it $(PHP_CONTAINER) composer install

# Полный процесс: init, add-host, build, up и composer install
start:
	@echo "Starting full process: init, add-host, build, up, and composer install..."
	$(MAKE) init
	$(MAKE) add-host
	$(MAKE) build
	$(MAKE) up
	$(MAKE) composer-install

# Остановка контейнеров
down:
	@echo "Stopping and removing Docker containers..."
	docker compose down

restart:
	@echo "Restart container..."
	$(MAKE) down
	$(MAKE) up

ps:
	docker compose ps -a