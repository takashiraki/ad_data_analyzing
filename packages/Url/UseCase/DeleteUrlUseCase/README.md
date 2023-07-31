---
title: ""
output: ""
---

# Url情報削除ユースケース

## 期待すること
1. 一覧画面の『削除する』を押下する
2. 確認画面を表示する
3. 確認ボタンを押下後、削除が実行される
4. 削除が完了する

## 画面表示項目
### 削除確認画面（index）
* 広告コード名
* 媒体名
* 媒体詳細名
* LP名
* FORM名

### 削除完了画面(handle)
* 広告コード名
* 媒体名
* 媒体詳細名
* LP名
* FORM名

## Index
### 設計図
![index](https://github.com/takashiraki/github_image/blob/master/images/adas/url/deleteIndex.png)

### フロー
1. コントローラーはURLから`url_id`を受け取る
2. コントローラーは`url_id`のバリデーションチェックを行う

    バリデーション項目
    | バリデーション項目 | バリデーション内容 | エラー処理 |
    | -- | -- | -- |
    | `url_id` | 36文字か否か | メッセージを載せて422エラーを返す |

3. コントローラーはリクエストの作成を行う

    リクエストのプロパティは
    ```php
    /**
     * @var string
     */
    private $url_id;
    ```

4. インタラクターはリクエストから`url_id`を受け取る
5. ドメインサービスは`url_id`の存在確認を行う

    #### チェック後の動き
    | 結果 | 処理内容 |
    | -- | -- |
    | `true` | 処理続行 |
    | `false` | `UrlDeleteError`クラスにメッセージを定義して、`DeleteUrlResult`クラスを返す |

6. リポジトリはデータの取得を行う
7. インタラクターはサマリーの取得を行う
8. インタラクターはレスポンスの作成を行う

    `DeleteUrlResult`を返す

9. コントローラーはビューモデルの作成を行う

    ビューモデルのプロパティは
    ```php
    /**
     * @var string
     */
    private $url_id;

    /**
     * @var string
     */
    private $url_name;

    /**
     * @var string
     */
    private $medium_name;

    /**
     * @var string
     */
    private $medium_dtl_name;

    /**
     * @var string
     */
    private $lp_name;

    /**
     * @var string
     */
    private $form_name;
    ```

10. ビューに返す



## Handle
### 設計図
![handle](https://github.com/takashiraki/github_image/blob/master/images/adas/url/deleteHandle.png)

### フロー
1. コントローラーはURLとフォームから`url_id`を受け取る
2. コントローラーは`url_id`のバリデーションを行う

    #### バリデーション項目
    | バリデーション項目 | バリデーション内容 | エラー処理 |
    | -- | -- | -- |
    | `url_id` | 36文字か否か | メッセージを載せて422エラーを返す |

3. コントローラーはリクエストの作成を行う

    #### リクエストのプロパティは
    ```php
    /**
     * @var string
     */
    private $url_id;
    ```

4. インタラクターはリクエストから`url_id`の取得を行う
5. ドメインサービスは`url_id`の存在を確かめる

    #### チェック後の動き
    | 結果 | 処理内容 |
    | -- | -- |
    | `true` | 処理続行 |
    | `false` | `UserDeleteError`クラスにメッセージを定義して、`DeleteUserResult`クラスを返す |

6. リポジトリは`url_id`からデータの取得を行う
7. リポジトリはデータの削除を実行する

    #### 下記関数を`UrlRepositoryIntereface`に追加する必要あり
    | 関数名 | 処理内容 | 引数 | 戻り値 |
    | -- | -- | -- | -- |
    | `delete` | 指定されたデータの削除を行う | `UrlId` | `bool` |

    #### エラー処理
    | ケース | 処理 |
    | -- | -- |
    | 削除が実行できなかった場合 | todo ここ考える必要あり |

8. インタラクターはレスポンスの作成を行う

    `UserDeleteResult`を返す
    →値オブジェクトの作成

    下記ファイルを `Application`配下に作成
    * `UserDeleteResult`
    * `UserDeleteError`

9.  ビューに返す

    #### エラーがある場合
    エラーがある場合は、一覧にリダイレクトさせる

    この場合はエラーメッセージを載せてリダイレクト

    #### エラーがない場合
    エラーがない場合は、削除完了画面に遷移させる
