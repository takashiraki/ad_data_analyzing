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
![handle](https://github.com/takashiraki/github_image/blob/master/images/adas/url/editHandle.png)

### フロー

1. コントローラーはフォームから入力内容を受け取る

    フォームからの取得項目は
    | 取得項目 | 取得形式 | 
    | -- | -- |
    | `url_id` | hidden ,urlからそれぞれ受け取る |
    | `url_name` | text |
    | `medium_id` | optionタグのvalue |
    | `medium_dtl_id` | optionタグのvalue |
    | `lp_id` | optionタグのvalue |
    | `form_id` | optionタグのvalue |

2. コントローラーは入力内容をバリデーションチェックする

    #### バリデーション項目
    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | `url_id` | 入力必須 , string , 36文字 |
    | `url_name` | 入力必須 , string , 1文字以上50文字以内 |
    | `medium_id` | 入力必須 , string , 36文字 |
    | `medium_dtl_id` | 入力必須 , string , 36文字 |
    | `lp_id` | 入力必須 , string , 36文字 |
    | `form_id` | 入力必須 , string , 36文字 |

    #### また、下記項目のチェックも行う
    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | `url_id` | hidden urlで渡ってくるものが一致してるか否か |

3. コントローラーはリクエストを作成する

    リクエストのプロパティは
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
    private $medium_id;


    /**
     * @var string
     */
    private $medium_dtl_id;


    /**
     * @var string
     */
    private $lp_id;


    /**
     * @var string
     */
    private $form_id;
    ```

4. インタラクターはリクエストから`url_id`を取得する
5. ドメインサービスは`url_id`が存在するか否かを確認する

    ドメインサービス`existById`を使う

6. リポジトリは`url_id`から広告コードデータの取得を行う

    リポジトリ`findById`を使う

7. インタラクターは広告コード名の変更がある場合のみ、名前重複の確認を行う

    #### 下記関数を`UrlDomainService`に追加する
    | 関数名 | 処理内容 | 引数 | 戻り値 |
    | -- | -- | -- | -- |
    | `equalByName` | 名前が一致してるか否か | `Url` , `OldUrl` | `bool` |

8. リポジトリはデータの更新を行う

    #### 下記関数を`UrlRepository`に追加する
    | 関数名 | 処理内容 | 引数 | 戻り値 |
    | -- | -- | -- | -- |
    | `update` | URLの更新 | `Url` | `url` |

9. インタラクターはレスポンスの作成を行う

    ```php
    /**
     * @var UrlSummary
     */
     private $url_summary
    ```

10. コントローラーはビューモデルの作成を行う

    ビューモデルのプロパティ
    ```php
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


11. ビューに返す