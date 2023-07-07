@extends('Lp.layout')
@section('title','LP登録')

@section('contents')
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    
    <form action="/lps/store" method="post">
        @csrf
        <label>LP名</label>
        <input type="text" name="lp_name">

        <label>LPディレクトリ</label>
        <input type="text" name="lp_directory">

        <label>メモ</label>
        <textarea name="lp_memo"cols="30" rows="10"></textarea>
        <button type="submit">登録する</button>
    </form>
@endsection