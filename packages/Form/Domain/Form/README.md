---
title: "Form"
output: "Form"
---

# Form (Domain Model)
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