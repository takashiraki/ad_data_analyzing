---
title: "Url情報登録ユースケース"
output: "Url情報登録ユースケースの仕様並びに設計"
---

# Url情報登録ユースケース

## 期待すること
1. URL登録画面に遷移する
2. URL登録画面で情報を入力する
3. URL登録を押下
4. URLが保存される

大きく分けて
* index
* handle

に分かれる

## Index
### 設計図
![index](https://github.com/takashiraki/github_image/blob/master/images/adas/url/createindex.png)

### フロー
1. リポジトリはURL発行に必要なデータを取得する

    必要なデータ
    | 項目 | 詳細 |
    | -- | -- 
    | 媒体系 | `MediumId` , `MediumName` |
    | 媒体詳細系 | `MediumDtlId` , `MediumDtlName` |
    | LP系 | `LpId` , `LpName` |
    | FORM系 | `FormId` , `FormName` |

    データ取得系関数を作る必要がある気がする
    →`UrlRepositoryInterface`に作成してみよう

    作成関数
    | メソッド名 | 処理内容 |
    | -- | -- |
    | `getAllMedia` | 全媒体情報の取得 |
    | `getAllMediumDtls` | 全媒体詳細情報の取得 |
    | `getAllLps` | 全LP情報の取得 |
    | `getAllforms` | 全form情報の取得 |

2. インタラクターはレスポンスを作成する

    レスポンスのプロパティは
    ```php
    /**
    *
    * @var null|array
    */
    private $media

    /**
    *
    * @var null|array
    */
    private $media_dtls

    /**
    *
    * @var null|array
    */
    private $lps

    /**
    *
    * @var null|array
    */
    private $forms
    ```

3. コントローラーはレスポンスからビューモデルの作成をする

    ビューモデルのプロパティは
    ```php
    /**
    *
    * @var null|array
    */
    private $media

    /**
    *
    * @var null|array
    */
    private $media_dtls

    /**
    *
    * @var null|array
    */
    private $lps

    /**
    *
    * @var null|array
    */
    private $forms
    ```

4. ビューに返す

## Handle
### 設計図
![handle](https://github.com/takashiraki/github_image/blob/master/images/adas/url/createHandle.png)
### フロー
1. コントローラーはフォームの入力内容を受け取る
2. コントローラーはバリデーションチェックする

    チェック内容
    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | `medium_id` | 入力必須 , string , 36文字 |
    | `medium_dtl_id` | 入力必須 , string , 36文字 |
    | `lp_id` | 入力必須 , string , 36文字 |
    | `form_id` | 入力必須 , string , 36文字 |

3. コントローラーはリクエストを作成する

    リクエストのプロパティは
    ```php
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

4. インタラクターは、リクエスト内容を受け取る
5. ドメインサービスはリクエストで取得したIDの存在確認をする

    それぞれDomain Serviceに存在する関数で存在確認を行う
    | 処理項目 | 処理内容 | ファイル |
    | -- | -- | -- |
    | `medium_id` | `medium_id` の存在確認 | `MediumDomainService.php` |
    | `medium_dtl_id` | `medium_dtl_id` の存在確認 | `MediumDtlDomainService.php` |
    | `lp_id` | `lp_id` の存在確認 | `LpDomainService.php` |
    | `form_id` | `form_id` の存在確認 | `FormDomainService.php` |

6. リポジトリは保存する

    下記関数を追記する必要あり
    | 関数名 | 処理内容 | 引数 | 戻り値 |
    | -- | -- | -- | -- |
    | `save` | 保存を実行する | `medium_id` , `medium_dtl_id` , `lp_id` , `form_id` , `url_id` , `url_name` |

7. リポジトリはそれぞれデータの名前を取得する

    それぞれDomain Serviceに存在する関数で存在確認を行う
    | 処理項目 | 処理内容 | ファイル |
    | -- | -- | -- |
    | 媒体系データ | `medium_id` の存在確認 | `MediumRepositoryInterface.php` |
    | 媒体詳細系データ | `medium_dtl_id` の存在確認 | `MediumDtlRepositoryInterface.php` |
    | LP系 | `lp_id` の存在確認 | `LpRepositoryInterface.php` |
    | FORM系 | `form_id` の存在確認 | `FormepositoryInterface.php` |

8. インタラクターはレスポンスの作成をする

    レスポンスのプロパティは
    ```php
    /**
     * @var Media
     */
    private $medium;

    /**
     * @var MediumDtl
     */
    private $medium_dtl;

    /**
     * @var Lp
     */
    private $lp;

    /**
     * @var Form
     */
    private $form;
    ```

9. コントローラーはビューモデルを作成する

    ビューモデルのプロパティは
    ```php
    /**
     * @var Media
     */
    private $medium;

    /**
     * @var MediumDtl
     */
    private $medium_dtl;

    /**
     * @var Lp
     */
    private $lp;

    /**
     * @var Form
     */
    private $form;
    ```

10. ビューに返す