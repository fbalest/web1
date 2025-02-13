FROM php:7.4-apache
RUN docker-php-ext-install mysqli
COPY web/ /var/www/html/
RUN chmod -R 755 /var/www/html/assets
EXPOSE 8081
CMD ["apache2-foreground"]
