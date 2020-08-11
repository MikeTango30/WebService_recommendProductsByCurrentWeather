#!/usr/bin/env bash

# Make us independent from working directory
pushd `dirname $0` > /dev/null
SCRIPT_DIR=`pwd`
popd > /dev/null


# Prerequisites
echo "Checking prerequisites..."
sleep 1
docker --version > /dev/null 2>&1 || { echo >&2 "Docker not found. Please install it via https://docs.docker.com/install/"; exit 1; }
docker-compose --version > /dev/null 2>&1 || { echo >&2 "Docker-compose not found. Please install it via https://docs.docker.com/compose/install/"; exit 1; }
if [ ! -f "$SCRIPT_DIR/../src/.env" ]; then
    if [ -f "$SCRIPT_DIR/../src/.env.example" ]; then
      echo "Creating .env file..."
        cp "$SCRIPT_DIR/../src/.env.example" "$SCRIPT_DIR/../src/.env"
        sed -i "s/localhost/localhost:8080/g" "$SCRIPT_DIR/../src/.env"
        sed -i "s/DB_HOST=127.0.0.1/DB_HOST=mysql/g" "$SCRIPT_DIR/../src/.env"
        sed -i "s/DB_DATABASE=laravel/DB_DATABASE=homestead/g" "$SCRIPT_DIR/../src/.env"
        sed -i "s/DB_USERNAME=root/DB_USERNAME=homestead/g" "$SCRIPT_DIR/../src/.env"
        sed -i "s/DB_PASSWORD=/DB_PASSWORD=secret/g" "$SCRIPT_DIR/../src/.env"
    else
        echo >&2 "No .env.example file..."
        exit 1
    fi
fi

# Start server
echo "Starting docker containers..."
docker-compose -f "$SCRIPT_DIR/../docker-compose.yml" up -d
sleep 1

# Install dependencies
if [ ! -d "$SCRIPT_DIR/../src/vendor" ]; then
  echo "Executing composer install..."
  docker-compose exec php composer install
fi

## Fix Ownerships
echo "Fixing storage ownerships..."
sleep 1
docker-compose exec php chown www-data -R /var/www/storage
echo "Fixing bootstrap/cache ownerships..."
sleep 1

# Generate App Key
echo "Generating App Key..."
sleep 1
docker-compose exec php php /var/www/artisan key:generate

# Run migrations
echo "Preparing to run migrations and seeder..."
sleep 1
echo "Almost ready..."
sleep 1

# Run migrations
echo "Executing migrations..."
docker-compose exec php php /var/www/artisan migrate

# Seed database
echo "Seeding database..."
docker-compose exec php php /var/www/artisan db:seed

echo "Now open in browser http://127.0.0.1:8080"