# コンテナ単位で変更する箇所
team=team-b
app=test-function-api

# 処理
echo ""
tput setaf 2; echo "Dockerイメージの作成に入ります"
echo ""
tput setaf 6;

docker build --no-cache -t app1 /Users/okuryunosuke/repository/Twitter_clone/docker/Dockerfile

tput setaf 7;



   
version: '3'
services:
  app:
    build: ./docker
    ports:
      - 80:80
    volumes:
      - ./app:/var/www/app
    working_dir: /var/www/app
    depends_on:
      - db
  db:
    platform: linux/x86_64
    image: mysql:5.7
    ports:
      - 3306:3306
    environment:
      MYSQL_DATABASE: database
      MYSQL_USER: user
      MYSQL_PASSWORD: pass
      MYSQL_ROOT_PASSWORD: rootpw