---
title: "User情報編集ユースケース"
output: "User情報編集に関する仕様ならびに設計"
---

# User情報編集ユースケース

## 期待すること
1. `users/{id(36桁)}/edit`に遷移すると、編集画面に出てくる
2. 編集画面で編集する情報の入力をする（入力欄の中に既存情報がすでに入力されている感じ）

    編集可能項目
    * ユーザー名
    * メールアドレス
    * 権限


3. 更新ボタンを押すと更新完了

## 設計図(Index)
![index](https://github.com/takashiraki/github_image/blob/master/images/adas/user/editIndex.png)

## フロー(index)
1. `users/{id(36桁)}/edit`リンクを踏んで、編集画面に遷移する
2. コントローラーはurlから`user_id`を取得する
3. コントローラーは`user_id`のバリデーションを行う

    バリエーション項目
    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | `user_id` | 36文字か否か |

4. コントローラーはリクエストの作成を行う

    リクエストのプロパティは
    ```php
    private $user_id;
    ```

5. インタラクターは、リクエストから`user_id`の取得を行う
6. ドメインサービスは`user_id`が存在するか否かを

    下記関数をドメインサービスに追加
    | 関数名 | 処理内容 | 引数 | 戻り値
    | -- | -- | -- | -- |
    |  `existById` | Emailに該当するデータがあるか否か | `UserId` | `bool` |

7. リポジトリは`user_id`からデータの取得を行う

    下記関数をリポジトリに追加
    | 関数名 | 処理内容 | 引数 | 戻り値
    | -- | -- | -- | -- |
    |  `findById` | Emailに該当するデータがあるか否か | `UserId` | `?User` |

8. インタラクターはレスポンスの作成を行う

    レスポンスのプロパティは
    ```php
    private $user_id;
    private $user_name;
    private $email;
    private $privilege;
    ```

9. コントローラービューモデルの作成を行う

    ビューモデルのプロパティは
    ```php
    private $user_id;
    private $user_name;
    private $email;
    private $privilege;
    ```

10. ビューに返す

## 設計図(Handle)

## フロー(Handle)
