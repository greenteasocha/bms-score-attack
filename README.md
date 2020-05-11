# BMS-daily-score-attack
趣味の音ゲー(BMSと言います)をテーマに毎日コンテストを開催する物を作っています。

予め用意されたリストから毎日ランダムに課題曲を決定します。
ユーザーはランキングの閲覧、投稿(要ユーザー登録)、また各ユーザーの過去の成績の閲覧ができます。

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
