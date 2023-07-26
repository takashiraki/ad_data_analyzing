@extends('layout.common')
@section('description', '媒体登録完了')
@section('title', '媒体登録完了')
@include('layout.side')
@include('layout.header',['h2'=>'登録画面'])

@section('form')
    <div id="add" class="wrap">
        <div class="inner">
            <a class="back-btn" href="/medium/search"><p><i class="fa-solid fa-angles-left"></i></p></a>
            <h3 class="hl-03"><img src="{{ Vite::asset('resources/image/btn-add.svg') }}" alt="add">媒体登録</h3>
            <div class="complete">
                <p>登録が完了しました</p>
                <ul>
                    <li><p>媒体名 : {{ $view_model->getMediumName() }}</p></li>
                    <li><p>媒体ID : {{ $view_model->getMediumId() }}</p></li>
                </ul>
                <a href="/medium/search" class="close-btn"><p>閉じる</p></a>
            </div>
        </div>
    </div>
@endsection

@include('layout.table',['item'=>'medium'])
