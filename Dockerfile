# Dockerfile for the web service
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libmariadb-dev \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli

# Copy application code to the Apache web root
COPY ./web /var/www/html

# Expose port 80
EXPOSE 80
