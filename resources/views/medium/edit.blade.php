<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体編集画面 | ADAS</title>
</head>
<body>
    <form action="/medium/{{$record->medium_id}}/update" method="post">
        @csrf
        <input type="text" name="medium_name" value="{{ $record->medium_name }}">
        <input type="hidden" name="medium_id" value="{{ $record->medium_id }}">
        <button type="submit">更新する</button>
    </form>
</body>
</html>