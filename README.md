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
<img width="1152" height="1041" alt="index drawio" src="https://github.com/user-attachments/assets/c00753eb-83de-455e-b071-2cad156a7a92" />

## テーブル仕様書
<img width="757" height="265" alt="スクリーンショット 2026-03-31 183701" src="https://github.com/user-attachments/assets/c79a051d-8ca7-45a3-a5b7-ae5f90b949b7" />  

<img width="757" height="237" alt="スクリーンショット 2026-03-31 183858" src="https://github.com/user-attachments/assets/532582d3-7ff3-43a5-9798-cd00b1d6d1d1" />  

<br><br>

<img width="759" height="253" alt="スクリーンショット 2026-03-31 184046" src="https://github.com/user-attachments/assets/be96f985-59a5-41d7-a48f-b77441314b67" />

<br><br>

<img width="757" height="124" alt="スクリーンショット 2026-03-31 184154" src="https://github.com/user-attachments/assets/8ee71dc6-e2ac-470e-a44d-a35cce255d9b" />

<br><br>

<img width="759" height="131" alt="スクリーンショット 2026-03-31 184256" src="https://github.com/user-attachments/assets/d1c6bff3-86ad-4a66-9d2d-cb9ca1323ddd" />

<br><br>

<img width="759" height="160" alt="スクリーンショット 2026-03-31 184407" src="https://github.com/user-attachments/assets/40a4ce3d-64cc-4f80-8256-5ae8d826146a" />

<br><br>

<img width="757" height="149" alt="スクリーンショット 2026-03-31 184629" src="https://github.com/user-attachments/assets/16dedb06-0b25-4f30-8583-20487861906c" />

<br><br>

<img width="756" height="174" alt="スクリーンショット 2026-03-31 185445" src="https://github.com/user-attachments/assets/7ab268df-e24d-46bb-a2f2-6ecf197a82b1" />

<br><br>

<img width="757" height="230" alt="スクリーンショット 2026-03-31 184903" src="https://github.com/user-attachments/assets/25bceb87-35a9-4b89-84e7-00151a1f1d85" />

## URL
#### ・商品一覧画面: http://localhost/
#### ・ログイン画面: http://localhost/login
#### ・会員登録画面: http://localhost/register
#### ・phpmyadmin: http://localhost:8080/
