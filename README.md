# お問い合わせフォーム

## 環境構築

**Docker ビルド**

1. `git clone git@github.com:tkdisk49/contact.git`
2. `docker-compose up -d --build`

> _Mac の M3 チップの PC の場合、エラーが発生しビルドができないことがあります。
> エラーが発生する場合は、docker-compose.yml ファイルの「mysql」と「phpmyadmin」内に「platform」の項目を追加で記載してください_

```bash
mysql:
    image: mysql:8.0.26
    platform: linux/amd64(この文を追加)

phpmyadmin:
    image: phpmyadmin/phpmyadmin
    platform: linux/amd64(この文を追加)
```

**Laravel 環境構築**

1. `docker-compose exec php bash`
2. `composer install`
3. .env.example ファイルから.env を作成し、環境変数を変更

```text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術（実行環境）

- PHP 8.3.11
- Laravel 8.38.8
- MySQL 8.0.26

## ER 図

![alt](https://github.com/user-attachments/assets/6c44f7d1-032a-408d-8dda-1994d622eab7)

## URL

- 開発環境：<http://localhost/>
- phpMyAdmin：<http://localhost:8080>
