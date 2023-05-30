<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体削除確認 | ADAS</title>
</head>

<body>
    <p>下記媒体を削除しますか？</p>
    <p>※削除後は、データの復元はできません</p>

    <form action="/medium/{{ $view_model->getMediumId() }}/destroy" method="post">
        @csrf
        <p>媒体名</p>
        <p>{{ $view_model->getMediumName() }}</p>
        <input type="hidden" name="medium_id" value="{{ $view_model->getMediumId() }}">
        <button type="submit">削除する</button>
    </form>
</body>

</html>
