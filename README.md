http://localhost:8000/
  
http://localhost:8081/index.php?route=/&route=%2F&db=test_database
  
MYSQL_ROOT_PASSWORD: secret  
MYSQL_DATABASE: test_database  
MYSQL_USER: db_user  
MYSQL_PASSWORD: secret  

docker-compose up --build  
docker-compose up -d  
docker-compose down  