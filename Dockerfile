FROM php:5.6-apache
COPY php/ /var/www/html/

CMD ["apachectl", "-D", "FOREGROUND"]
