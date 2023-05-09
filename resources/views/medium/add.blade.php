<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/medium/add" method="post">
        @csrf
    <label>媒体名</label>
    <input type="text" name="medium_name">

    <button type="submit">登録する</button>
    </form>
</body>
</html>