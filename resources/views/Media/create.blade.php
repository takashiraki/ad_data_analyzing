@extends('layout.common')
@section('description', '登録画面')
@section('title', '媒体登録')
@include('layout.side')
@include('layout.header',['h2'=>'登録画面'])

@section('form')
    <div id="add" class="wrap">
        <div class="inner">
            <a class="back-btn" href="/medium/search"><p><i class="fa-solid fa-angles-left"></i></p></a>
            <h3 class="hl-03"><img src="{{ Vite::asset('resources/image/btn-add.svg') }}" alt="add">媒体登録</h3>
            <form method="post" class="add-form" action="/medium/store">
                @csrf
                <label>
                    <img src="{{ Vite::asset('resources/image/btn-add.svg') }}'" alt="" srcset="">
                    <span>媒体名</span>
                    <input type="search" class="add-field" placeholder="" name="medium_name">
                </label>
                <input type="submit" class="add-submit" value="登録する">
            </form>
        </div>
    </div>
@endsection

@include('layout.table',['item'=>'medium'])
