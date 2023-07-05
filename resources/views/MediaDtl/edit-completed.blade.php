@extends('MediaDtl.layout')

@section('title','媒体詳細編集完了')

@section('contents')
    <p>媒体詳細編集完了</p>
    <label>媒体詳細名</label>
    <p>{{ $view_model->getMediumDtlName() }}</p>
    <label>媒体詳細ID</label>
    <p>{{ $view_model->getMediumDtlId() }}</p>
    <label>媒体名</label>
    <p>{{ $view_model->getMediumName() }}</p>
    <p>媒体詳細一覧へ</p>
    <a href="/medium-dtls">媒体詳細一覧へ</a>
@endsection