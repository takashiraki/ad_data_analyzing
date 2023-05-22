<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体詳細一覧 | ADAS</title>
</head>

<body>
    <ul>
        @foreach ($medium_dtl_records as $medium_dtl_record)
            <li>{{ $medium_dtl_record->medium_dtl_name }} : {{ $medium_dtl_record->medium_dtl_id }} :
                {{ $medium_dtl_record->medium_name }}
                {{ $medium_dtl_record->medium_id }}
                <a href="/medium-dtls/{{ $medium_dtl_record->medium_dtl_id }}/edit">編集する</a>
                <a href="/medium-dtls/{{ $medium_dtl_record->medium_dtl_id }}/delete">削除する</a>
            </li>
        @endforeach
    </ul>
</body>

</html>
