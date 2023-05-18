<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体詳細情報登録</title>
</head>
<body>
    <form action="/medium-dtls/store" method="post">
        @csrf
        <label>媒体詳細名</label>
        <input type="text" name="medium_dtl_name">
        <label>親媒体</label>
        <select name="medium_id">
            <option value="">選択してください</option>
            @foreach ($data as $media_data)
                <option value="{{ $media_data->medium_id }}">{{ $media_data->medium_name }}</option>
            @endforeach
        </select>
        <button type="submit">登録する</button>
    </form>
</body>
</html>