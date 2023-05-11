<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Medium Complated</title>
</head>
<body>
    <p>登録完了</p>
    @foreach ($data as $user_data)
        <ul>
            <li>{{ $user_data->medium_name }} : {{ $user_data->id }}</li>
        </ul>
    @endforeach
</body>
</html>