<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medium list</title>
</head>
<body>

    @foreach ($data as $user_data)
        <ul>
            <li>{{ $user_data->medium_name }} : {{ $user_data->id }} : {{ $user_data->created_at }} : {{ $user_data->updated_at }}</li>
        </ul>
    @endforeach
    
</body>
</html>