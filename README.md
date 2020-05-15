# BMS-daily-score-attack
趣味の音ゲー(BMSと言います)をテーマに毎日コンテストを開催する物を作っています。

予め用意されたリストから毎日ランダムに課題曲を決定します。
ユーザーはランキングの閲覧、投稿(要ユーザー登録)、また各ユーザーの過去の成績の閲覧ができます。

## Build
```
docker-compose up -d
```
コンテナを立ち上げた後、コンテナに入ってDBの設定をしてください (あと、port:3306の被りに注意してください)
```
docker-compoese exec db sh
# mysql -uroot -p
Enter password: secret(見えません)
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 14
Server version: 8.0.19 MySQL Community Server - GPL

Copyright (c) 2000, 2020, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> create database score_attack;
Query OK, 1 row affected (0.01 sec)

mysql> exit
Bye
# exit
```
次にappコンテナでテストデータのシーディングを行います。
```
% docker-compose exec app sh
/work # php artisan migrate:refresh --seed
```
以下のようになれば成功です。
```
Migration table not found.
Migration table created successfully.
Migrating: 2020_04_23_080446_create_users_table
Migrated:  2020_04_23_080446_create_users_table (0.07 seconds)
Migrating: 2020_04_23_080455_create_musics_table
Migrated:  2020_04_23_080455_create_musics_table (0.03 seconds)
Migrating: 2020_04_23_080535_create_contests_table
Migrated:  2020_04_23_080535_create_contests_table (0.11 seconds)
Migrating: 2020_04_23_080542_create_scores_table
Migrated:  2020_04_23_080542_create_scores_table (0.2 seconds)
Seeding: UsersTableSeeder
Seeding: MusicsTableSeeder
Seeding: ContestsTableSeeder
Seeding: ScoresTableSeeder
Database seeding completed successfully.
```
```
localhost:10080
```
にアクセス。

## URI
/home ... 当日開催のコンテストや過去数日の履歴にアクセスできます。(今は定期実行の枠組みを作ってないので日付は適当で固定)  
/contests ... 今までに開催されたコンテストにアクセスできます。今はviewができてないのでJSONが帰ってきます  
/contests/{ID} ... それぞれのコンテストページです。ログイン状態だとスコアが投稿できます。  
/users/{ID} ... それぞれのユーザーの戦績が見れます。  

## イメージ画像

<img width="1434" alt="スクリーンショット 2020-05-11 10 21 18" src="https://user-images.githubusercontent.com/37926549/81516009-7878ed80-9371-11ea-9303-5d0300be3647.png">


<img width="1437" alt="スクリーンショット 2020-05-11 10 24 10" src="https://user-images.githubusercontent.com/37926549/81516050-a2321480-9371-11ea-8794-8c7c3a7b18b6.png">

要素技術  

docker-compose

-app 
- Laravel
    基本的なルーティング(get, post, 404へのredirectなど)
    コントローラ 及びサービスプロバイダへの分離
    bladeテンプレートによる表示
      継承はヘッダーのみ
    ログイン機能
      デフォルトのものをそのまま流用
       remember meはまだ使えません

-db
- MySQL
    migrationファイルによるテーブル構築
    seedingによる開発用ダミーデータの作成

- herokuへの公開(まだです)
- 定期実行による毎日のコンテストの生成(まだです)
