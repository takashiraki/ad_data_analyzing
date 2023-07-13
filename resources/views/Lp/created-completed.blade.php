@extends('Lp.layout')
@section('title','LP登録完了')

@section('contents')
    <p>登録完了</p>

    <label>LP ID</label>
    <p>{{ $view_model->getLpId() }}</p>

    <label>LP名</label>
    <p>{{ $view_model->getLpName() }}</p>

    <label>LPディレクトリ</label>
    <p>{{ $view_model->getLpDirectory() }}</p>

    <label>メモ</label>
    <p>{!! nl2br(e($view_model->getLpMemo())) !!}</p>

    <a href="#">LP一覧へ</a>
    
@endsection