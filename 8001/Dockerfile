FROM tutum/lamp
LABEL maintainer="wpsec"
COPY ./run.sh /run.sh
COPY ./2web.sql /root/2web.sql
RUN mkdir /var/www/html/vulnerabilities && mkdir /var/www/html/css && mkdir /var/www/html/fonts && mkdir /var/www/html/js && echo 123 > /home/key  && chmod 755 /root/2web.sql && chmod 755 /run.sh
COPY ./app/*.php /var/www/html/
COPY ./app/vulnerabilities/* /var/www/html/vulnerabilities/
COPY ./app/css/* /var/www/html/css/
COPY ./app/fonts/* /var/www/html/fonts/
COPY ./app/js/* /var/www/html/js/
ENTRYPOINT ["/run.sh"]

