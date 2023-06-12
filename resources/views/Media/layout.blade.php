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
        <meta name="description" content="">
        <meta name="format-detection" content="telepfhone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
        <title>@yield('title') | ADAS</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../js/table.js">
        <link rel="stylesheet" href="../js/nav.js">
        <script src="https://kit.fontawesome.com/60583edc38.js" crossorigin="anonymous"></script>
    </head>

    <body>
        
        <div class="header">
            <div class="inner">
                <div class="title">
                    <p>Welcome back, user</p>
                    <h2 class="hl-02">@yield('title')</h2>
                </div>
                <ul class="btns">
                    <li><a href="./add.html"><p><img src="../image/btn-add.svg" alt="add"><img src="../image/btn-add-hover.svg" alt="add" class="hover"></p></a></li>
                    <!-- <li><a href=""><p><img src="../image/btn-csv.svg" alt="csv"><img src="../image/btn-csv-hover.svg" alt="csv" class="hover"></p></a></li> -->
                    <li><a href="./search.html"><p><img src="../image/btn-search.svg" alt="search"><img src="../image/btn-search-hover.svg" alt="search" class="hover"></p></a></li>
                </ul>
            </div>
        </div>

        @yield('contents')

    </body>

</html>

