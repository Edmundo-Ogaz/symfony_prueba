FROM kibatic/symfony:7.3


RUN apt-get update && \
    apt-get install -y \
        php7.3-ldap \
        php-pgsql

COPY . /var/www
