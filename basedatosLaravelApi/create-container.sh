#!/bin/bash

docker run -d -p 3306:3306\
         --name jorge_mysql\
         -e MYSQL_ROOT_PASSWORD=admin00\
         -e MYSQL_DATABASE=jorge_mysql\
         -e MYSQL_USER=jorge\
         -e MYSQL_PASSWORD=jorge\
         -v /home/usuario/Escritorio/basedatos/mysqldata:/var/lib/mysql\
         mysql:latest\
          --character-set-server=utf8mb4\
         --collation-server=utf8mb4_unicode_ci
