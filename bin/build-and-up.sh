#!/usr/bin/bash

success='\xE2\x9C\x85';
fail='\xE2\x9D\x8C';
br='\r\n'

APP_PATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 || exit ; pwd -P )" && cd "$APP_PATH"/../ || exit

printf "Iniciando processo de deploy ${success}${br}"

printf "Update docker images${br}";
docker-compose pull

printf "Inicializando sistema${br}";
if ! docker-compose up -d --force-recreate --build --remove-orphans; then
    printf "${fail}Erro ao inicializar sistema${fail}${br}";
    exit 1
fi

printf "Instalando o compose${br}";
if ! docker-compose exec uello-app composer install --optimize-autoloader --no-dev; then
    printf "${fail}Erro ao executar o compose${fail}${br}";
    exit 1
fi

printf "Verifica se existe chave do projeto ${br}";
if ! docker-compose exec uello-app php artisan app_key:exists; then
    printf "Gerando chave ${br}";
    if ! docker-compose exec uello-app php artisan key:generate --ansi; then
        printf "Não foi possivel gerar a chave ${fail}${br}";
        exit 1
    fi
fi

sudo chown 1000:1000 docker
sudo chown 1000:1000 vendor
chmod +x database/migrations/
sudo chmod 777 -R storage/

printf "Rodando as migrations ${br}";
if ! docker-compose exec uello-app php artisan migrate; then
    printf "${fail}Erro ao executar as migrations${fail}${br}";
    exit 1
fi

printf "Limpando a configuração ${br}";
docker-compose exec uello-app php artisan config:clear;

printf "Fazendo cache da configuração ${br}";
docker-compose exec uello-app php artisan config:cache;

printf "Finalizando processo de deploy ${success}${br}";
