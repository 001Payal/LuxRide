#!/bin/bash

# Wait for MariaDB to be up
until mysqladmin ping --silent; do
    echo "Waiting for MariaDB..."
    sleep 1
done

# Check if DB already exists
if ! mysql -uroot -e 'USE carbooking'; then
    echo "Importing init.sql..."
    mysql -uroot < /var/www/html/init.sql
else
    echo "Database already initialized."
fi
