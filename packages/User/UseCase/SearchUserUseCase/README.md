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

2. コントローラーは検索情報のバリデーションを行う

    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | `user_name` | max:50 |
    | `email` | max:256 |
    | `privilege` | max:10 |

3. コントローラーはリクエストの作成を行う

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

4. インタラクターは検索結果を受け取る
5. リポジトリ該当するデータを検索する

    下記関数をrepositoryに追加する必要あり
    | 関数名 | 処理内容 | 引数  | 戻り値 |
    | -- | -- | -- | -- |
    | `search` | 該当データを引っ張る| `?QueryName` , `?QueryEmail` , `?QueryPrlivirege`| `?array` |

6. インタラクターはレスポンスを作成する

    レスポンスのプロパティは
     ```php
     /**
     *
     * @var null|array
     */

    private $records;
     ```

7. コントローラーはビューモデルを作成する
8. レスポンスのプロパティは
     ```php
     /**
     *
     * @var null|array
     */

    private $records;
     ```

9. ビューに返す