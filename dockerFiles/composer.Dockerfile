FROM composer:latest

WORKDIR /var/www/proxyparts

ENTRYPOINT [ "composer", "--ignore-platform-reqs"]