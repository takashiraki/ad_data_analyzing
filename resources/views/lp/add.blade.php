<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LP登録 | ADAS</title>
</head>

<body>
    <form action="/lps" method="post">
        @csrf
        <label>LP名</label>
        <input type="text" name="lp_name">

        <label>LPディレクトリ</label>
        <input type="text" name="route">

        <label>備考</label>
        <textarea name="lp_remark"cols="30" rows="10"></textarea>

        <button type="submit">登録する</button>
    </form>
</body>

</html>
