<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体一覧 | ADAS</title>
</head>
<body>

    @foreach ($records as $media_record)
        <ul>
            <li>{{ $media_record->medium_name }} : {{ $media_record->medium_id }} : {{ $media_record->created_at }} : {{ $media_record->updated_at }} <a href="/medium/{{ $media_record->medium_id }}/edit">編集する</a><a href="/medium/{{ $media_record->medium_id }}/delete">削除する</a></li>
        </ul>
    @endforeach
    
</body>
</html>