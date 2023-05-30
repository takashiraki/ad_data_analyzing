<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体登録完了 | ADAS</title>
</head>

<body>
    <p>登録完了</p>
    <label>媒体ID</label>
    <p>{{ $view_model->getMediumId() }}</p>
    <label>媒体名</label>
    <p>{{ $view_model->getMediumName() }}</p>
    <a href="/media">媒体一覧へ</a>
</body>

</html>
