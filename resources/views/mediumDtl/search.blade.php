<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体詳細検索画面</title>
</head>
<body>
    <form action="/medium-dtls/search" method="get">
        @csrf
        <label>媒体詳細名</label>
        <input type="text" name="medium_dtl_name">
        <label>媒体詳細ID</label>
        <input type="text" name="medium_dtl_id">
        <label>親媒体名</label>
        <input type="text" name="medium_name">
        <button type="submit">検索する</button>
    </form>
    @foreach ($records as $medium_dtl_record)
            <ul>
                <li>{{ $medium_dtl_record->medium_dtl_name }} : {{ $medium_dtl_record->medium_dtl_id }} : {{ $medium_dtl_record->medium_name}} </li>
            </ul>
    @endforeach
</body>
</html>