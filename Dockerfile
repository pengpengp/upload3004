FROM vulhub/php:5.5-apache



COPY ./www  /var/www/html

COPY docker-entrypoint /usr/local/bin/  
RUN chmod +x /usr/local/bin/docker-entrypoint
COPY flag.sh /usr/local/bin/ 
RUN chmod +x /usr/local/bin/flag.sh

WORKDIR /usr/local/bin/

ENTRYPOINT ["/usr/local/bin/docker-entrypoint"]

