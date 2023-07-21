---
title: "Delete form feature"
output: "フォーム削除機能に関する仕様ならびに設計"
---

# Form情報削除ユースケース
* Index (フォーム削除の確認)
* Handle(フォームの削除)

に分けて考える。

## 設計図(Index)
![index](https://github.com/takashiraki/github_image/blob/master/images/adas/form/deleteIndex.png)

## フロー(Index)
1. コントローラーはURLから`form_id`を受け取る
2. コントローラーは`form_id`のバリデーションを行う

    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | form_id | 文字数が36文字か否か |

3. コントローラーはリクエストを作成する

    リクエストのプロパティは
    ```php
    private $form_id;
    ```

4. インタラクターは、リクエストから`form_id`の取得を行う
5. インタラクターは`form_id`の存在の有無をドメインサービスの問い合わせる
6. 存在が確認できた場合、リポジトリにデータ取得の命令
7. レスポンスの作成

    レスポンスのプロパティは
    ```php
    private $form_id;
    private $form_name;
    private $form_directory;
    private $form_memo;
    ```

8. ビューモデルの作成

    ビューモデルのプロパティは
    ```php
    private $form_id;
    private $form_name;
    private $form_directory;
    private $form_memo;
    ```

## 設計図(Handle)
![handle](https://github.com/takashiraki/github_image/blob/master/images/adas/form/deleteHandle.png)

## フロー(Handle)
1. コントローラーはURLから`form_id`を受け取る
2. コントローラーはバリデーションを行う

    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | form_id | 文字数が36文字か否か , URlから渡ってきた`form_id`とPOSTされた`form_id`が一致するか否か |

3. コントローラーはリクエストを作成する

    リクエストのプロパティは
    ```php
    private $form_id;
    ```

4. インタラクターは、リクエストから`form_id`の取得を行う
5. インタラクターはドメインサービスに対して`form_id`がの存在の有無を命令する
6. インタラクターは該当データの取得を行う
7. インタラクターはリポジトリに対して該当するデータの削除を命ずる

    削除にあたり、下記メソッド追加
    | 関数名 | 処理内容 | 引数 | 戻り値 |
    | -- | -- | -- | -- |
    | `delete` | データの削除を行う | `Form` | `Form` |

8. インタラクターレスポンスの作成を行う

    レスポンスのプロパティは
    ```php
    private $form_id;
    private $form_name;
    private $form_directory;
    private $form_memo;
    ```

9. コントローラーはビューモデルの作成を行う

    ビューモデルのプロパティは
    ```php
    private $form_id;
    private $form_name;
    private $form_directory;
    private $form_memo;
    ```
10. ビューに返す