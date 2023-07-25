---
title: "User情報削除ユースケース"
output: "User情報削除ユースケースの仕様並びに設計"
---

# User情報検索ユースケース

## 期待すること
1. `/Users`にアクセスする
2. 最初は一覧が追加が新しい順にリストで出てくる
3. 検索をすると、getで期待したものが出てくる

## Index
### 設計図

![index](https://github.com/takashiraki/github_image/blob/master/images/adas/user/search.png)

### フロー
1. コントローラーは検索されたクエリをGETで受け取る

    検索可能な項目
    * ユーザー名
    * メールアドレス
    * 権限

     ```php

    /**
     *
     * @var null|string
     */
    private $query_user_name;

    /**
     *
     * @var null|string
     */
    private $query_email;

    /**
     *
     * @var null|string
     */
    private $query_privilege;
     ```

2. コントローラーはリクエストの作成を行う

    リクエストのプロパティは
     ```php
     /**
     *
     * @var null|string
     */
     private $user_name;

     /**
     *
     * @var null|string
     */
     private $email;

     /**
     *
     * @var null|string
     */
     private $privilege;
      ```

3. インタラクターは検索結果を受け取る
4. リポジトリ該当するデータを検索する

    下記関数をrepositoryに追加する必要あり
    | 関数名 | 処理内容 | 引数  | 戻り値 |
    | -- | -- | -- | -- |
    | `search` | 該当データを引っ張る| `?QueryName` , `?QueryEmail` , `?QueryPrlivirege`| `?array` |

5. インタラクターはレスポンスを作成する

    レスポンスのプロパティは
     ```php
     /**
     *
     * @var null|array
     */

    private $records;
     ```

6. コントローラーはビューモデルを作成する
7. レスポンスのプロパティは
     ```php
     /**
     *
     * @var null|array
     */

    private $records;
     ```

8. ビューに返す