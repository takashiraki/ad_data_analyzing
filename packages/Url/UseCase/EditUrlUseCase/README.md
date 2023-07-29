---
title: "Url情報編集ユースケース"
output: " Url情報編集ユースケースの仕様並びに設計"
---

# Url情報編集ユースケース
## 期待すること
1. 一覧画面の『編集する』を押下すると編集画面に遷移する
2. 情報編集画面でユーザーは情報を変更する
3. 更新ボタンを押下する
4. 更新が完了する

## Index
### 設計図
![index](https://github.com/takashiraki/github_image/blob/master/images/adas/url/editIndex.png)

### フロー
1. コントローラーはURLから`url_id`を取得する
2. コントローラーはurlのバリデーションを行う

    バリデーション項目
    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | `url_id` | 36文字か否か |

3. コントローラーはリクエストの作成を行う

    リクエストのプロパティは
    ```php
    /**
     * @var string
     */
    private $url_id;
    ```

4. インタラクターはリクエストから`url_id`を取得する
5. ドメインサービスは`url_id`からデータの存在を確認する

    #### 下記関数をドメインサービスに追記する
    | 関数名 | 処理内容 | 引数 | 戻り値 |
    | -- | -- | -- | -- |
    | `existById` | 広告コードIDが存在するか否かを確かめる | `url_id` | `bool` |

    #### 下記関数をリポジトリに追記する
    | 関数名 | 処理内容 | 引数 | 戻り値 |
    | -- | -- | -- | -- |
    | `fondById` | 広告コードIDが存在するか否かを確かめる | `url_id` | `Url` |


6. リポジトリデータの取得を行う

    #### 取得順序
    | 取得項目 | 使用関数 | ファイル名 |
    | -- | -- | -- |
    | `medium_id` , `medium_dtl_id` , `lp_id` , `form_id` | `findById` | UrlRepositoryInterface.php |
    | `medium_name` | `find` | MediumRepositoryInterface.php |
    | `medium_dtl_name` | `findById` | MediumDtlRepositoryInterface.php |
    | `lp_name` | `findById` | LpRepositoryInterface.php |
    | `form_name` | `findById` | FormRepositoryInterface.php |

7. インタラクターはレスポンスの作成を行う

    レスポンス用の値オブジェクトを作成する（ドメインの不自然さを解消する : ドメインサービス）
    クラス名 : UrlSummary
    | プロパティ | 型 |
    | -- | -- |
    | `url_id` | `string` |
    | `url_name` | `string` |
    | `medium` | `Medium` |
    | `medium_dtl` | `MediumDtl` |
    | `lp` | `Lp` |
    | `form` | `Form` |

    こいつを返す

8. コントローラーはレスポンスからビューモデルの作成を行う

    ビューモデルのプロパティは
    ```php
    /**
     * @var string
     */
    private $url_summary;
    ```

9.  ビューに返す

## Handle
### 設計図

### フロー