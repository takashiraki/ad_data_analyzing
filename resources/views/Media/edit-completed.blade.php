@extends('Media.layout')
@section('title', '媒体編集完了')

@section('contents')
    <p>編集完了</p>
    <a href="/media">媒体一覧へ</a>

    <p>媒体ID</p>
    <p>{{ $view_model->getMediumId() }}</p>
    <p>媒体名</p>
    <p>{{ $view_model->getMediumName() }}</p>
@endsection
