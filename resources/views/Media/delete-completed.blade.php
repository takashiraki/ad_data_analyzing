@extends('layout.common')
@section('description', '媒体削除完了')
@section('title', '媒体削除完了')
@include('layout.side')
@include('layout.header',['h2'=>'媒体削除完了'])

@section('form')
    <div id="add" class="wrap">
        <div class="inner">
            <a class="back-btn" href="/medium/search"><p><i class="fa-solid fa-angles-left"></i></p></a>
            <h3 class="hl-03"><img src="{{ Vite::asset('resources/image/btn-add.svg') }}" alt="add">媒体削除</h3>
            <div class="complete">
                <p>削除が完了しました</p>
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
