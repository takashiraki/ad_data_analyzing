@extends('MediaDtl.layout')
@section('title', '媒体詳細登録完了')

@section('contents')
    <p>媒体詳細登録完了</p>
    <label>媒体詳細ID</label>
    <p>{{ $view_model->getMediumDtlId() }}</p>
    <label>媒体詳細名</label>
    <p>{{ $view_model->getMediumDtlName() }}</p>
    <label>媒体名</label>
    <p>{{ $view_model->getMediumName() }}</p>
    <a href="#">媒体詳細一覧へ</a>
@endsection
