<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>媒体登録 | ADAS</title>
</head>

<body>
    <form action="/medium/store" method="post">
        @csrf
        <label>媒体名</label>
        <input type="text" name="medium_name">

        <button type="submit">登録する</button>
    </form>

</body>

</html>
