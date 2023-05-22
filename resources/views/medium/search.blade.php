<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search medium</title>
</head>
<body>
    <form action="/medium/search" method="get">
        <label>媒体名</label>
        <input type="text" name="medium_name">
        <label>媒体ID</label>
        <input type="text" name="medium_id">
        <button type="submit">検索する</button>
    </form>

    @foreach ($records as $media_record)
        <ul>
            <li>{{ $media_record->medium_name }} : {{ $media_record->medium_id }} <a href="/medium/{{ $media_record->medium_id }}/edit">編集する</a><a href="/medium/{{ $media_record->medium_id }}/delete">削除する</a></li>
        </ul>
    @endforeach
    
</body>
</html>