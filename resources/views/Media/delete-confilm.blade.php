@extends('layout.common')
@section('description', '媒体削除確認')
@section('title', '媒体管理')
@include('layout.side')
@include('layout.header',['h2'=>'媒体削除確認'])

@section('form')
    <div id="delete" class="wrap">
        <div class="inner">
            <a class="back-btn" href="/medium/search"><p class="btn"><i class="fa-solid fa-angles-left"></i></p></a>
            <h3 class="hl-03"><img src="{{ Vite::asset('resources/image/btn-trash.svg') }}" alt="delete" class="icon">媒体削除</h3>
            <p class="message">下記項目を削除しますか？<br>※削除後は、データの復元はできません</p>
            <form action="/medium/{{ $view_model->getMediumId() }}/destroy" method="post" role="delete" method="get" class="add-form" action="URL">
                @csrf
                <label>
                    <span>媒体名</span>
                    <input type="search" class="add-field noevent" placeholder="{{ $view_model->getMediumName() }}" value="" name="s" readonly>
                </label>
                <label>
                    <span>媒体ID</span>
                    <input type="search" class="add-field noevent" placeholder="{{ $view_model->getMediumId() }}" value="" name="s" readonly>
                </label>
                <input type="submit" class="add-submit" value="削除">
            </form>
        </div>
    </div>
@endsection

@include('layout.table',['item'=>'medium'])
