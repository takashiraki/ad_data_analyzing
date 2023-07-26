@extends('layout.common')
@include('layout.header')
@section('title', '媒体登録')
@section('description', '登録画面')
@include('layout.side')

@section('contents')
    <section id="bords">
        <div id="add" class="wrap">
            <div class="inner">
                <a class="back-btn" href="./list.html"><p><i class="fa-solid fa-angles-left"></i></p></a>
                <h3 class="hl-03"><img src="/image/btn-add.svg" alt="add">媒体登録<a href=""></a></h3>
                <form method="post" class="add-form" action="/medium/store">
                    @csrf
                    <label>
            
                        <img src="{{ asset('image/btn-add.svg') }}" alt="" srcset="">
            
                        <span>媒体名</span>
                        <input type="search" class="add-field" placeholder="" name="medium_name">
                    </label>
                    <input type="submit" class="add-submit" value="登録する">
                </form>
            </div>
        </div>
    </section>
@endsection