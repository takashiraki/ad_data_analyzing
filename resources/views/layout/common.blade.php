<!DOCTYPE html>
<html lang="ja">
    <meta charset="UTF-8">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="expires" content="0">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <meta name="description" content="@yield('description')">
        <meta name="format-detection" content="telepfhone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
        <title>@yield('title') | ADAS</title>
        <link rel="stylesheet" href="/js/table.js">
        <link rel="stylesheet" href="/js/nav.js">
        <script src="https://kit.fontawesome.com/60583edc38.js" crossorigin="anonymous"></script>
        @vite(['resources/scss/style.scss', 'resources/js/app.js'])
    </head>

    <body>
        @yield('side')

        <section id="content">
            @yield('header')
            @yield('form')
            @yield('table')
        </section>

    </body>

</html>

