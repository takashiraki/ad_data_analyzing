@section('header')
<div class="header">
    <div class="inner">
        <div class="title">
            <p>Welcome back, user</p>
            <h2 class="hl-02">@yield('title')</h2>
        </div>
        <ul class="btns">
            <li><a href="./add.html"><p><img src="../image/btn-add.svg" alt="add"><img src="../image/btn-add-hover.svg" alt="add" class="hover"></p></a></li>
            <li><a href="./search.html"><p><img src="../image/btn-search.svg" alt="search"><img src="../image/btn-search-hover.svg" alt="search" class="hover"></p></a></li>
        </ul>
    </div>
</div>
@endsection