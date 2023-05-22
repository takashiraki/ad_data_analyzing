<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体詳細編集画面 | ADAS</title>
</head>

<body>
    <form action="/medium-dtls/{{ $medium_dtl_record->medium_dtl_id }}/update" method="post">
        @csrf
        <input type="text" name="medium_dtl_name" value="{{ $medium_dtl_record->medium_dtl_name }}">
        <input type="hidden" name="medium_dtl_id" value="{{ $medium_dtl_record->medium_dtl_id }}">
        <select name="medium_id">
            <option value="">選択してください</option>
            @foreach ($medium_records as $medium_record)
                <option value="{{ $medium_record->medium_id }}">{{ $medium_record->medium_name }}</option>
            @endforeach
        </select>
        <button type="submit">更新する</button>
    </form>
</body>

</html>
