## В репозитории несколько разных сайтов - примеров -> Авторизации (регистрации) аутентификации, CRUD, PDO, ...  

``` Docker
http://localhost:8000/
  
http://localhost:8081/index.php?route=/&route=%2F&db=test_database
  
MYSQL_ROOT_PASSWORD: secret  
MYSQL_DATABASE: ale  
MYSQL_USER: ale  
MYSQL_PASSWORD: secret  

docker-compose up --build  
docker-compose down  
docker-compose up -d  

Добавить sql запрос 
   
CREATE TABLE users (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(255) NOT NULL,  
    email VARCHAR(255) NOT NULL  
);  
```

``` Docker
=== файл Docker

# Use an official PHP runtime
FROM php:8.2-apache

# Enable Apache modules
RUN a2enmod rewrite

# Install any extensions you need
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the source code in /www into the container at /var/www/html
COPY ../www .

```
## Проверить! эти строки могут быть лишними в новых версиях ПО
      # MYSQL_USER: ... # при создании контейнера выдает ошибку, нужно убрать эту строку
      # MYSQL_PASSWORD: ... # и эту строку

```yml
=== файл docker-compose.yml

version: '3.9'
services:
  webserver:
    container_name: PHP-1
    build: 
      context: .
      dockerfile: Dockerfile
    volumes:
      - ./www:/var/www/html
    ports:
      - 8000:80
    depends_on:
      - mysql-db

  mysql-db:
    container_name: mysql-1
    image: mysql:8.0
    environment:
      MYSQL_ROOT_PASSWORD: secret
      MYSQL_DATABASE: ale
      MYSQL_USER: ale
      MYSQL_PASSWORD: secret
    volumes:
      - ./www/mysql-data:/var/lib/mysql
    ports:
      - "3306:3306"

  phpmyadmin:
    container_name: phpmyadmin-1
    image: phpmyadmin/phpmyadmin
    depends_on:
      - mysql-db
    ports:
      - "8081:80"
    environment:
      PMA_HOST: mysql-db
      MYSQL_ROOT_PASSWORD: secret

```  
