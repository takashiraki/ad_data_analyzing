---
title: "Form search usecase"
output: "Form検索機能の仕様並びに設計"
---

# Form情報検索ユースケース

## 設計図
![index](https://github.com/takashiraki/github_image/blob/master/images/adas/form/search.png)

## フロー
1. コントローラーは`GET`で検索パラメーターの受け取り

    ```php
    $request->query('form_name');
    $request->query('form_directory');
    ```

2. コントローラーはバリデーション

    バリデーション項目
    | バリデーション項目 | バリデーション内容 |
    | -- | -- |
    | `form_name` | 50文字以内か否か |
    | `form_directory` | 10文字以内か否か |

3. コントローラーはリクエストの作成

    リクエストのプロパティは
    ```php
    private $query_form_name;
    private $query_form_directory;
    ```
    
    **※初回アクセス時も同じ手順を踏むため、null許容**

4. インタラクターはリクエストからクエリの受け取り
5. インタラクターはリポジトリに対して検索命令

    下記関数をリポジトリインターフェースに追加する必要あり
    | 関数名 | 処理内容 | 引数 | 戻り値
    | -- | -- | -- | -- |
    |  `Search` | IDに該当するデータの取得 | `?FormName` , `?FormDirectory` | `?Form` |

6. インタラクターは検索結果を配列で受け取る
7. インタラクターはレスポンスの作成

    レスポンスのプロパティは
    ```php
    private $records;
    ```

8. コントローラーはビューモデルの作成

    ビューモデルのプロパティは
    ```php
    private $records;
    ```

9.  ビューに返す