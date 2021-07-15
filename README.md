Após clonar o repositório executar:

- docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
    
- docker-compose up -d

- cp .env.example .env

- docker exec -it prova_backend_sr_laravel.test_1 /bin/sh

- php artisan key:generate

- endpoint: /api/news
