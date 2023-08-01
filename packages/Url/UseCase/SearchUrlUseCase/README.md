---
title: "URl情報検索ユースケース"
output: "URl情報検索ユースケースの仕様並びに設計"
---

# URL情報検索ユースケース

## 期待すること
1. `/urls`にアクセスすると、URL一覧と検索窓が出てくる
2. 検索窓に文字を打ち込む
3. 検索ボタンを押すと、検索結果が一覧で出てくる（昇順で）

## Index

### 設計図
![index](https://github.com/takashiraki/github_image/blob/master/images/adas/url/search.png)

### フロー
1. コントローラーはgetでフォームの入力内容を受け取る

    #### ユーザーの入力内容
    * URL名
    * 媒体名
    * 媒体詳細名
    * LP名
    * フォーム名

2. コントローラーはバリデーションチェックをかける

    #### バリデーション内容 
    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | `url_name` | 最大50文字 |
    | `medium_name` | 最大50文字 |
    | `medium_dtl_name` | 最大50文字 |
    | `lp_name` | 最大50文字 |
    | `form_name` | 最大50文字 |

3. コントローラーはリクエストの作成をする

    #### リクエストのプロパティ
    ```php
    private $url_name;
    private $medium_name;
    private $medium_dtl_name;
    private $lp_name;
    private $form_name;
    ```

    プロパティについて
    | 項目 | null許容 |
    | -- | -- |
    | URL名 | ⚪︎ |
    | 媒体名 | ⚪︎ |
    | 媒体詳細名 | ⚪︎ |
    | LP名 | ⚪︎ |
    | FORM名 | ⚪︎ |

4. インラタラクターは検索結果を受け取る
5. リポジトリは該当するデータを検索する

    #### `UrlRepositoryInterface`に下記関数を追加する必要あり
    | 関数名 | 処理内容 | 引数 | 戻り値 |
    | -- | -- | -- | -- |
    | `search` | 該当するデータの検索を行う | `?url_name` , `?medium_name` , `?medium_dtl_name` , `?lp_name` , `?form_name` | `?array`|

6. インタラクターはレスポンスを作成する

    レスポンスのプロパティは
    ```php
    private $records;
    ```

7. コントローラーはビューモデルを作成する

    ビューモデルのプロパティは
    ```php
    private $records;
    ```

8. ビューに返す