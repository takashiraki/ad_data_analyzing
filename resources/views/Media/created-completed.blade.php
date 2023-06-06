@extends('Media.layout')
@section('title', '媒体登録完了')

@section('contents')
    <p>登録完了</p>
    <label>媒体ID</label>
    <p>{{ $view_model->getMediumId() }}</p>
    <label>媒体名</label>
    <p>{{ $view_model->getMediumName() }}</p>
    <a href="/media">媒体一覧へ</a>
@endsection
