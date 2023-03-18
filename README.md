## このプロダクトについて
このプロダクトはインターンのコーディング課題用に製作されたものです.
スレッドとレスからなる簡単な掲示板アプリとなっています.
スレッドの閲覧、レスの閲覧はログインしなくても行うことができますが, スレッドの投稿やレスの投稿, 編集, 削除などはログイン状態でないと行うことができません.
また管理者ユーザーも用意されており, ` localhost:8000/admin/register `にアクセスすることで管理者ユーザーを追加することができます.
管理者ユーザーはスレッドの作成, レスの送信などを行うことはできず, スレッド又はレスの強制削除のみを行うことができます.
ユーザー管理など認証系にはBreezeを利用しております.

## セットアップ方法

- Laravel_Docker_Intern直下に` .env `を作成し以下にある ` .env `のフォーマットに従って記述してください.
- ` $ docker compose up -d --build `にて各コンテナを起動してください.
- ` $ docker compose exec php bash `でphpコンテナに入る.
- ` $ cd Laravel_Docker `でLaravel_Dockerディレクトリに移動します.
- ` Laravel_docker `直下に` .env `を作成し以下にある ` Laravel_Docker/.env `の内容をコピーし, DBの部分を任意の値に変更してください
- ` $ composer install `を実行する.
- ` $ php artisan migarate `でマイグレーションを行う.
- ` $ npm install && npm run build`を行う.
- ` localhost:8000 `にアクセスすればスレッド一覧が表示されます.

## .env

```
MYSQL_ROOT_PASSWORD=
MYSQL_DATABASE= 
MYSQL_USER= 
MYSQL_PASSWORD= 
TZ=
```

## Laravel_Docker/.env

```
APP_NAME=Laravel 
APP_ENV=local 
APP_KEY=base64:G7dMywtx4n1qpbWdZb2PtpL9g3DKBe4N6gmqo6/5TPU=
APP_DEBUG=true
APP_URL=http://localhost
LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug
DB_CONNECTION=mysql
DB_HOST= MYSQLコンテナのコンテナ名
DB_PORT=3306
DB_DATABASE= MYSQL_DATABASEと同じ
DB_USERNAME= MYSQL_USERと同じ
DB_PASSWORD= MYSQL_PASSWORDと同じ
BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
MEMCACHED_HOST=127.0.0.1
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
