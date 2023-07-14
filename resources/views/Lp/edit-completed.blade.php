@extends('Lp.layout')
@section('title','LP情報編集完了')

@section('contents')
    <p>登録完了</p>

    <p>LP名</p>
    <p>{{ $view_model->getLpName() }}</p>
    <p>LPディレクトリ</p>
    <p>{{ $view_model->getLpDirectory() }}</p>
    <p>備考</p>
    <p>{{ $view_model->getLpMemo() }}</p>

    <a href="# ">LP一覧へ</a>
@endsection