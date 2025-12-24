FROM php:8.2-apache

COPY entrypoint.sh /entrypoint.sh

# Install MariaDB and PHP MySQL extensions
RUN apt-get update && \
    apt-get install -y mariadb-server supervisor && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    a2enmod rewrite

RUN echo "[mysqld]" > /etc/mysql/conf.d/strict-mode.cnf && \
    echo "sql_mode=NO_ENGINE_SUBSTITUTION" >> /etc/mysql/conf.d/strict-mode.cnf

# Allow .htaccess to work (set AllowOverride)
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy website files and init.sql
COPY . /var/www/html/
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set ownership
RUN chown -R www-data:www-data /var/www/html

# Startup script to init MariaDB before Apache
COPY init.sh /init.sh
RUN chmod +x /init.sh

# Use entrypoint to set the flag at runtime
ENTRYPOINT ["/entrypoint.sh"]

# Start services
CMD ["/usr/bin/supervisord"]
