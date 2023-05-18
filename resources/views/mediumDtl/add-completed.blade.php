<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体詳細登録完了</title>
</head>
<body>
    <p>登録完了</p>
    @foreach ($data as $medium_dtl_record)
        <ul>
            <li>{{ $medium_dtl_record->medium_dtl_name }} : {{ $medium_dtl_record->medium_dtl_id }}</li>
        </ul>
    @endforeach
</body>
</html>