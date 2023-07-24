---
title: "User"
output: "User"
---

# User(Domain object)
従業員のことを指す

Userの主な構成要素は
* `UserId`
* `UserName`
* `Privilege`
* `Email`
* `PasswordHash`

である

## 制約条件
| プロパティ名 | 型 | サイズ | NULL許容 | 備考 |
| -- | -- | -- | -- | -- |
| `UserId` | `character` | 36 | × | uuid |
| `UserName` | `character varying` | 256 | × |  |
| `Privilege` | `character varying` | 10 | × |  |
| `Email` | `character varying` | 256 | × | Unique |
| `PasswordHash` | `character varying` | 256 | × |  |