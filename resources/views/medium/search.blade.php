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
        <input type="text" name="name">
        <label>媒体ID</label>
        <input type="text" name="id">
        <button type="submit">検索する</button>
    </form>

    @foreach ($data as $user_data)
        <ul>
            <li>{{ $user_data->medium_name }} : {{ $user_data->id }}</li>
        </ul>
    @endforeach
</body>
</html>