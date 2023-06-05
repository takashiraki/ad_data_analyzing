@extends('Media.layout')
@section('title', '媒体削除確認')

@section('contents')
    <p>下記媒体を削除しますか？</p>
    <p>※削除後は、データの復元はできません</p>

    <form action="/medium/{{ $view_model->getMediumId() }}/destroy" method="post">
        @csrf
        <p>媒体名</p>
        <p>{{ $view_model->getMediumName() }}</p>
        <input type="hidden" name="medium_id" value="{{ $view_model->getMediumId() }}">
        <button type="submit">削除する</button>
    </form>
@endsection
