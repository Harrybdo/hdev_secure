#!/bin/bash
rm -rf /etc/nginx/nginx.conf
mv /var/www/html/nginx.conf /etc/nginx/nginx.conf
rm -rf /var/cache/nginx/fastcgi_temp/*
mkdir -p /var/cache/nginx/fastcgi_temp
chown nginx:nginx /var/cache/nginx/fastcgi_temp
chmod 777 /var/cache/nginx/fastcgi_temp