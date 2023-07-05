@extends('MediaDtl.layout')

@section('title','媒体詳細削除確認')

@section('contents')
<form action="/medium-dtls/{{ $view_model->getMediumDtlId() }}/delete" method="post">
    @csrf
    <p>下記項目を削除しますか？</p>
    <label>媒体詳細名</label>
    <p>{{ $view_model->getMediumDtlName() }}</p>
    
    <label>媒体詳細ID</label>
    <p>{{ $view_model->getMediumDtlId() }}</p>
    
    <label>媒体名</label>
    <p>{{ $view_model->getMediumName() }}</p>

    <input type="hidden" name="medium_dtl_id" value="">
    <button type="submit">削除する</button>
</form>
@endsection