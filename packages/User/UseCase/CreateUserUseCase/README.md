---
title: "User情報登録ユースケース"
output: "User情報登録ユースケースの仕様並びに設計"
---

# User情報登録ユースケース

## Index
### 設計図
### フロー
1. コントローラーはビューを返す

## Handle
### 設計図
![handle](https://github.com/takashiraki/github_image/blob/master/images/adas/user/create.png)
### フロー
1. コントローラーは、フォームの入力内容を受け取る

    フォームの入力内容は
    * ユーザー名
    * メールアドレス
    * パスワード
    * パスワード（確認用）
    * 従業員権限

    これらが渡ってくる。

2. コントローラーは、フォームの入力内容をバリデーションにかける

    バリデーション内容
    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | `user_name` | 入力必須 , 50文字以内か否か , string |
    | `email` | 入力必須 , 1文字以上256文字以内か否か , メールアドレスか否か , string |
    | `password` | 入力必須 , 8文字以上256文字以内か否か , string |
    | `privilege` | 入力必須 , 文字以上10文字以内か否か , string |

3. バリデーションが問題なければ、コントローラーはリクエストを作成する

    リクエストのプロパティは
    ```php
    private $user_name;
    private $email;
    private $raw_password;
    private $privilege;
    ```

4. インタラクターは、リクエストからフォームの入力内容を受け取る
5. インタラクターは、メールアドレスの重複チェックをドメインサービスに命令する

    下記関数をドメインサービスに追加
    | 関数名 | 処理内容 | 引数 | 戻り値
    | -- | -- | -- | -- |
    |  `existByEmail` | Emailに該当するデータがあるか否か | `Email` | `bool` |

6. 重複が問題なければ、インスタンスの作成をする

    下記関数をドメインサービスに追加
    | 関数名 | 処理内容 | 引数 | 戻り値
    | -- | -- | -- | -- |
    |  `CreateHasedPassword` | Emailに該当するデータがあるか否か | `RawPassword` | `PassWordHash` |

7. インタラクターはリポジトリにデータの保存を命令する。

    下記関数をドメインサービスに追加
    | 関数名 | 処理内容 | 引数 | 戻り値
    | -- | -- | -- | -- |
    |  `save` | Userインスタンスの保存 | `User` | `User` |

8. レスポンスの作成を行う

    レスポンスのプロパティは
    ```php
    private $user_id;
    private $user_name;
    private $email;
    private $passwordhash;
    private privilege;
    ```
    
9. コントローラーはビューモデルの作成を行う

    ビューモデルのプロパティは
    ```php
    private $user_id;
    private $user_name;
    private $email;
    private $passwordhash;
    private privilege;
    ```