---
title: "User情報削除ユースケース"
output: "User情報削除ユースケースの仕様並びに設計"
---

# User情報編集ユースケース

## 期待すること
1.  `/users/{id}/delete`にgetでアクセスした際に、削除確認画面が出てくる
2.  削除ボタンを押下すると、削除が実行される
3.  削除完了後、削除完了の仮面が表示される

大きく分けて
1. index
2. handle

に分かれる

## Index

### 設計図
![index](https://github.com/takashiraki/github_image/blob/master/images/adas/user/deleteIndex.png)

### フロー
1. コントローラーはURLからuser_idを取得する
2. コントローラーはuser_idmのバリデーションを行う

    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | `user_id` | 36文字か否か |

3. コントローラーはリクエストの作成を行う

    リクエストのプロパティは
    ```php
    private $user_id;
    ```

4. インタラクターはリクエストからuser_idの取得を行う
5. ドメインサービスはuser_idの存在を確かめる
6. リポジトリはuser_idからデータの取得を行う
7. インタラクターはレスポンスの作成を行う

    レスポンスのプロパティは
    ```php
    private $user_id;
    private $user_name;
    private $email;
    private $privilege;
    ```

8. コントローラーはビューモデルの作成を行う

    ビューモデルのプロパティは
    ```php
    private $user_id;
    private $user_name;
    private $email;
    private $privilege;
    ```

9.  ビューに返す

## Handle

### 設計図
### フロー
1. コントローラーはURLからuser_idを受け取る
2. コントローラーはuser_idのバリデーションを行う
3. コントローラーはリクエストの作成を行う
4. インタラクターはリクエストからuser_idの取得を行う
5. ドメインサービスは、user_idが存在するか否かを確かめる
6. リポジトリはデータの取得を行う
7. リポジトリはデータの削除を行う
8. インタラクターはレスポンスの作成を行う
9. コントローラーはビューモデルの作成を行う
10. ビューに返す