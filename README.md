## アプリケーション名
### フリマアプリ　COACHTECH

## アプリケーションの詳細
### こちらは、不要な家具やアクセサリー、おもちゃなどを商品として出品したり、他の出品者が出品した商品を購入することができるフリマアプリです。
### また、コメント機能を使って商品にコメントをしたり、気になる商品を見つけたときは、いいね機能で商品をマイリストに保存したり、検索欄で探したい商品を検索することができます。

### ※商品の出品、購入、コメント、いいねをするには会員登録とログインが必要です。


## 環境構築の手順
### 1. リポジトリをクローンする
#### ・git clone git@github.com:P0502/mock-01.git

### 2. Dockerビルドを実行する
#### ・docker-compose up -d --build

### 3. Laravelのパッケージをインストールする
#### ・docker-compose exec php bash (PHPのコンテナに入る)
#### ・composer install (composerをインストールする)

### 4. env.ファイルを作成する
#### ・cp .env.example.env

### 5. マイグレーションを実行する
#### ・php artisan migrate

### 6. シーディング実行を実行する
#### ・php artisan db:seed

### 7. キーを生成する
#### ・php artisan key:generate


### ※stripeでは本番環境利用を申請をしないとコンビニ払いを選択した際に他のページへ移動してしまい、決済と購入が完了せず、商品一覧画面(URL:/)へリダイレクトすることができないため、stripeで決済を完了させるには必ずカード払いを選択してください。カード払いを選択して決済をした場合は、決済と購入完了後に自動的に商品一覧画面(URL:/)へリダイレクトします。



## 使用技術(実行環境)
#### ・PHP:8.1.34
#### ・Laravel:8.83.29
#### ・nginx:1.21.1
#### ・mysql:11.8.3
#### ・mailhog:1.0.1
#### ・phpmyadmin:8080:80

## ER図
<img width="1152" height="1041" alt="index drawio" src="https://github.com/user-attachments/assets/fdb2dd47-e49b-4a50-9b66-bb21fbb699c9" />


## テーブル仕様書
<img width="757" height="265" alt="スクリーンショット 2026-03-31 183701" src="https://github.com/user-attachments/assets/6dc31a53-4ea8-4d86-a3ad-e04d0fee5f67" />

<img width="757" height="237" alt="スクリーンショット 2026-03-31 183858" src="https://github.com/user-attachments/assets/d7fa542f-f5b8-41f6-a12f-f69d3464c207" />

<br><br>

<img width="759" height="253" alt="スクリーンショット 2026-03-31 184046" src="https://github.com/user-attachments/assets/78c07227-7807-4e22-9f04-54cae845060e" />

<br><br>

<img width="757" height="124" alt="スクリーンショット 2026-03-31 184154" src="https://github.com/user-attachments/assets/f1865ed3-bec4-4258-95fe-63630294138d" />

<br><br>

<img width="759" height="131" alt="スクリーンショット 2026-03-31 184256" src="https://github.com/user-attachments/assets/da29b54a-7be5-4346-b837-3fa2a55c2447" />

<br><br>

<img width="757" height="149" alt="スクリーンショット 2026-03-31 184629" src="https://github.com/user-attachments/assets/aa7de91f-3862-46d2-928f-b62d4f89237c" />

<br><br>

<img width="756" height="174" alt="スクリーンショット 2026-03-31 185445" src="https://github.com/user-attachments/assets/6d9c817b-8ed0-4d4f-a25e-80a41685685c" />

<br><br>

<img width="757" height="230" alt="スクリーンショット 2026-03-31 184903" src="https://github.com/user-attachments/assets/96bcf397-e1dd-408a-bc66-4aae8b1cc7fa" />

<br><br>


## URL
#### ・商品一覧画面: http://localhost/
#### ・ログイン画面: http://localhost/login
#### ・会員登録画面: http://localhost/register
#### ・phpmyadmin: http://localhost:8080/
