@extends('Lp.layout')
@section('title','LP削除確認')

@section('contents')
    <form action="/lps/{{ $view_model->getLpId() }}/delete" method="post">
        @csrf
        <p>下記LPを削除しますか？</p>
        
        <label>LP名</label>
        <p>{{ $view_model->getLpName() }}</p>

        <label>LPディレクトリ</label>
        <p>{{ $view_model->getLpDirectory() }}</p>

        <label>メモ</label>
        <p>{!! nl2br(e($view_model->getLpMemo())) !!}</p>

        <input type="hidden" name="lp_id" value="{{ $view_model->getLpId() }}">

        <button type="submit">削除する</button>
    </form>
@endsection