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
### フロー