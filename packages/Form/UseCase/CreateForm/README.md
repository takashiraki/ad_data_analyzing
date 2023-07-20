---
title: "Form情報登録ユースケース"
output: "Form情報登録ユースケース設計書"
---

# Form情報登録ユースケース

## 設計図
![設計図](https://github.com/takashiraki/github_image/blob/master/images/adas/form/create.png)

## フロー

### indexフロー
1. コントローラーにて `view`を返す

### handleフロー
1. コントローラーにて入力データの受け取り
2. コントローラーにてバリデーション

    #### バリデーション項目
    | 項目名 | バリデーション内容 |
    | -- | -- |
    | form_name | 入力必須 , string , 1文字以上50文字以内 |
    | form_directory | 入力必須 , string ,1文字以上10文字以内 |
    | form_memo | 50文字以内 |

3. リクエストの作成

    バリデーションが問題ない場合、リクエストの作成を行う

    リクエスト項目
    ```php
    private $form_name;
    private $form_directory;
    private $form_memo
    ```

4. インタラクターはリクエストを使って重複確認を行う

    重複確認にあたり、下記メソッドをドメインサービスに追加
    | 関数名 | 処理内容 | 引数 | 戻り値 |
    | -- | -- | -- | -- |
    | `existByName` | 名前がすでに存在しているか否かを確認する | `FormName` | `bool` |
    | `existByDirectory` | ディレクトリががすでに存在しているか否かを確認する | `FormDirectory` | `bool` |

5. 重複がなければ、リポジトリに対して保存

    保存にあたり、下記メソッド追加
    | 関数名 | 処理内容 | 引数 | 戻り値 |
    | -- | -- | -- | -- |
    | `save` | データの保存を行う | `Form` | `Form` |

6. レスポンスの作成

    主な項目は
    ```php
    private $form_name;
    private $form_directory;
    private $form_memo
    ```