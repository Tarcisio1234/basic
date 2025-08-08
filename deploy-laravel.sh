#!/bin/bash

# Nome do container Laravel
CONTAINER=basic-app

echo "===> Instalando dependências PHP com Composer..."
docker exec -it $CONTAINER composer install

echo "===> Instalando dependências JS com NPM..."
docker exec -it $CONTAINER npm install

echo "===> Compilando assets..."
docker exec -it $CONTAINER npm run build

echo "===> Gerando chave da aplicação Laravel..."
docker exec -it $CONTAINER php artisan key:generate

echo "===> Executando migrações e seeders..."
docker exec -it $CONTAINER php artisan migrate --seed

echo "===> Criando link simbólico para o storage..."
docker exec -it $CONTAINER php artisan storage:link

echo "===> Limpando cache de otimizações..."
docker exec -it $CONTAINER php artisan optimize:clear

echo "===> Iniciando o worker de fila (em segundo plano)..."
docker exec -d $CONTAINER php artisan queue:work --daemon

echo "✅ Script finalizado com sucesso!"
