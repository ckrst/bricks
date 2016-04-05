FROM php:5.6-apache
COPY php/ /var/www/html/
#COPY vagrant/web/000-default.conf /etc/apache2/sites_enabled/000-default.conf

RUN chown -R www-data:www-data /var/www/html

RUN a2ensite 000-default

# CMD ["apache2-foreground"]
