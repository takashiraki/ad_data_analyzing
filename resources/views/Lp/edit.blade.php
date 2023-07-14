@extends('Lp.layout')
@section('title','LP情報編集')

@section('contents')
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>


    <form action="/lps/{{ $view_model->getLpId() }}/update" method="post">
        @csrf

        <label>LP名</label>
        <input type="text" name="lp_name" value="{{ $view_model->getLpName() }}">
        <label>LPディレクトリ</label>
        <input type="text" name="lp_directory" value="{{ $view_model->getLpDirectory() }}">
        <label>LPメモ</label>
        <input type="text" name="lp_memo" value="{{ $view_model->getLpMemo() }}">

        <button type="submit">更新する</button>
    </form>
@endsection