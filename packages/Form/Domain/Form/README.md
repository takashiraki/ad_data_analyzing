---
title: "Form"
output: "Form"
---

# Form (Domain Object)
LPなどに設置、もしくは別ベーじに設置されているお問い合わせ蘭のこと。

Form (Domain model) の主な構成要素は
* FormId
* FormName
* FormDirectory
* FormMemo

である。

## 制約条件
| 要素 | 制約 |
| -- | -- |
| Form id | 36文字固定長,`string` |
| Form name | 1文字以上50文字以下,`string`|
| Form directory | 1文字以上10文字以下,`string` |
| Form memo | 50文字以内 |

## FormRepositoryInterface
| メソッド名 | 処理内容 | 引数 | 戻り値 |
| -- | -- | -- | -- |
| `findByName` | 名前で検索を行う | `FormName` | `?Form` |
| `findByDirectory` | ディレクトリで検索を行う | `FormDirectory` | `?Form` |