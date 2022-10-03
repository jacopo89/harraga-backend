FROM webdevops/php-apache:7.4

ENV PROVISION_CONTEXT "development"
COPY ./docker_conf/vhost.conf /opt/docker/etc/httpd/
# Configure volume/workdir
WORKDIR /app/
