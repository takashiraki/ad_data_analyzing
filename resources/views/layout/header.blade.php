@section('header')
<div class="header">
    <div class="inner">
        <div class="title">
            <p>Welcome back, user</p>
            <h2 class="hl-02">@yield('title')</h2>
        </div>
        <ul class="btns">
            <li><a href="./add.html"><p><img src="{{ asset('/image/btn-add.svg') }}" alt="add"><img src="{{ asset('/image/btn-add-hover.svg') }}" alt="add" class="hover"></p></a></li>
            {{-- <li><a href="./add.html"><p><img src="../image/btn-add.svg" alt="add"><img src="../image/btn-add-hover.svg" alt="add" class="hover"></p></a></li> --}}
            <li><a href="./search.html"><p><img src="../image/btn-search.svg" alt="search"><img src="../image/btn-search-hover.svg" alt="search" class="hover"></p></a></li>
            <img src="{{ asset('image/bg.png') }}" alt="" srcset="" width="100px" height="100px">
            <img src="../image/bg.png" alt="" srcset="" width="100px" height="100px">
        </ul>
    </div>
</div>
@endsection