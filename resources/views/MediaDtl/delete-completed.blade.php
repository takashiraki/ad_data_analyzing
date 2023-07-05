@extends('MediaDtl.layout')


@section('title',"媒体詳細削除完了")

@section('contents')
    <p>媒体詳細削除完了</p>
    <p>媒体詳細ID</p>
    <p>{{ $view_model->getMediumDtlId() }}</p>

    <p>媒体詳細名</p>
    <p>{{ $view_model->getMediumDtlName() }}</p>

    <p>媒体名</p>
    <p>{{ $view_model->getMediumName() }}</p>

    <a href="#">媒体詳細一覧へ</a>
@endsection