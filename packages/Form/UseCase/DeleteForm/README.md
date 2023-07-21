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

## フロー(Handle)