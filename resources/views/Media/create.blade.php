@extends('Media.layout')
@section('title', '媒体登録')

@section('contents')

    <section id="bords">
    
        <div id="add" class="wrap">
            <div class="inner">
                <a class="back-btn" href="./list.html"><p><i class="fa-solid fa-angles-left"></i></p></a>
                <h3 class="hl-03"><img src="../image/btn-add.svg" alt="add">媒体登録<a href=""></a></h3>
                <form method="post" class="add-form" action="/medium/store">
                    @csrf
                    <label>
                        <span>媒体名</span>
                        <input type="search" class="add-field" placeholder="" name="medium_name">
                    </label>
                    <input type="submit" class="add-submit" value="登録する">
                </form>
            </div>
        </div>

    </section>

@endsection