@extends('Media.layout')
@section('title', '媒体編集')

@section('contents')
    <form action="/medium/{{ $view_model->getMediumId() }}/update" method="post">
        @csrf
        <input type="text" name="medium_name" value="{{ $view_model->getMediumName() }}">
        <input type="hidden" name="medium_id" value="{{ $view_model->getMediumId() }}">
        <button type="submit">更新する</button>
    </form>
@endsection
