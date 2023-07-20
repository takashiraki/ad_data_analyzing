---
title: "Form情報編集ユースケース"
outpur: "Form情報ユースケースに関する仕様並びに設計"
---

# Form情報編集ユースケース

* 表示パターン(index)
* 編集実行パターン(handle)

に分けて設計を行う

## 設計図 (Index)
![設計図(index)](https://github.com/takashiraki/github_image/blob/master/images/adas/form/editIndex.png)

## フロー (Index)

1. コントローラーはURLから`form_id`を受け取る
2. コントローラーはIDのバリデーション

    バリデーション項目
    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    |  `form_id` | 36文字か否か |

3. バリデーション後、コントローラーリクエストの作成

    リクエストのプロパティは
    ```php
    private $form_id;
    ```

4. インタラクターはリクエストから `form_id`の取得
5. インタラクターは、インスタンスの作成
6. インタラクターはドメインサービスに対して`form_id`のデータが存在するか否かを確かめる

    下記関数をドメインサービスに追加
    | 関数名 | 処理内容 | 引数 | 戻り値
    | -- | -- | -- | -- |
    |  `existById` | IDに該当するデータがあるか否か | `FormId` | `bool` |

7. インタラクターはリポジトリに対してデータの取得を命令

    下記関数をリポジトリインターフェースに追加する必要あり
    | 関数名 | 処理内容 | 引数 | 戻り値
    | -- | -- | -- | -- |
    |  `findById` | IDに該当するデータの取得 | `FormId` | `?Form` |

8. インタラクターは取得したデータを使ってレスポンスの作成

    レスポンスのプロパティは
    ```php
    private $form_id;
    private $form_name;
    private $form_directory;
    private $form_memo
     ``

9. コントローラーはビューモデルの作成

    ビューモデルのプロパティは
    ```php
    private $form_id;
    private $form_name;
    private $form_directory;
    private $form_memo
     ``

## 設計図 (Handle)

## フロー (Handle)