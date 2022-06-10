# コンテナ単位で変更する箇所
team=team-b
app=test-function-api

# 処理
echo ""
tput setaf 2; echo "Dockerイメージの作成に入ります"
echo ""
tput setaf 6;

docker compose up --build

tput setaf 7;

docker compose exec app bash
