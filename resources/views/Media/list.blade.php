<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体一覧 | ADAS</title>
</head>

<body>

    @foreach ($view_model->getMediumRecords() as $media_record)
        <ul>
            <li>{{ $media_record->getMediumName()->getValue() }} : {{ $media_record->getMediumId()->getValue() }}<a
                    href="/medium/{{ $media_record->getMediumId()->getValue() }}/edit">編集する</a><a
                    href="/medium/{{ $media_record->getMediumId()->getValue() }}/delete">削除する</a></li>
        </ul>
    @endforeach

</body>

</html>
