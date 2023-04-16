FROM ubuntu:16.04

# Install Apache2 and PHP 7
RUN apt-get update && apt-get -y install php8.0 libapache2-mod-php8.0 php8.0-mcrypt php8.0-mbstring php8.0-pgsql php8.0-dom php8.0-curl php8.0-zip php8.0-sqlite3 php-xdebug

# Modification user www-data id
RUN usermod -u 1000 www-data

# Add virtual hosts
COPY sites-enabled/* /etc/apache2/sites-enabled/

# Add xdebug config file
COPY xdebug.ini /etc/php/8.0/mods-available/

# Install composer
RUN php -r "copy('http://getcomposer.org/download/1.3.1/composer.phar', '/usr/local/bin/composer');" && \
    chmod +x /usr/local/bin/composer

# Enable apache mod
RUN a2enmod rewrite

# Add and configure composer cache dir
RUN mkdir "/composer-cache" && chown -R www-data:www-data "/composer-cache"
ENV COMPOSER_CACHE_DIR /composer-cache

# Expose port 80
EXPOSE 80

# Manually set the apache environment variables in order to get apache to work immediately.
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
RUN mkdir -p $APACHE_RUN_DIR $APACHE_LOCK_DIR $APACHE_LOG_DIR

# Execute the apache daemon in the foreground so we can treat the container as an executable and it wont immediately return.
CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]
