
@section('contents')
    <a href="/media">媒体一覧へ</a>

    <p>媒体ID</p>
    <p>{{ $view_model->getMediumId() }}</p>
    <p>媒体名</p>
    <p>{{ $view_model->getMediumName() }}</p>
@endsection


@extends('layout.common')
@section('description', '媒体編集完了')
@section('title', '媒体編集完了')
@include('layout.side')
@include('layout.header',['h2'=>'媒体編集完了'])

@section('form')
    <div id="edit" class="wrap">
        <div class="inner">
            <a class="back-btn" href="/medium/search"><p><i class="fa-solid fa-angles-left"></i></p></a>
            <h3 class="hl-03"><img src="{{ Vite::asset('resources/image/btn-add.svg') }}" alt="add">媒体編集</h3>
            <div class="complete">
                <p>編集が完了しました</p>
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

