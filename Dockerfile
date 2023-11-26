# Use PHP with Apache
FROM php:7.4-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Set the document root to the 'public' directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Copy application source to the default apache document root
COPY . /var/www/html

# Update the Apache configuration to point to the new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Expose port 80
EXPOSE 80
