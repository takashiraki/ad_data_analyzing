@extends('Media.layout')
@section('title', '媒体登録')

@section('contents')
    <form action="/medium/store" method="post">
        @csrf
        <label>媒体名</label>
        <input type="text" name="medium_name">

        <button type="submit">登録する</button>
    </form>
@endsection
