@extends('layout.common')
@section('description', '媒体編集')
@section('title', '媒体編集')
@include('layout.side')
@include('layout.header',['h2'=>'媒体編集'])

@section('form')
    <div id="edit" class="wrap">
        <div class="inner">
            <a class="back-btn" href="/medium/search"><p><i class="fa-solid fa-angles-left"></i></p></a>
            <h3 class="hl-03"><img src="{{ Vite::asset('resources/image/btn-add.svg') }}" alt="add">媒体編集</h3>
            <form action="/medium/{{ $view_model->getMediumId() }}/update" method="post">
                @csrf
                <label>
                    <img src="{{ Vite::asset('resources/image/btn-add.svg') }}'" alt="" srcset="">
                    <span>媒体名</span>
                    <input type="search" class="add-field" placeholder="" name="medium_name" value="{{ $view_model->getMediumName() }}">
                </label>
                <label>
                    <img src="{{ Vite::asset('resources/image/btn-add.svg') }}'" alt="" srcset="">
                    <span>媒体ID</span>
                    <input type="search" class="add-field noevent" placeholder="" name="medium_name" value="{{ $view_model->getMediumId() }}" readonly>
                </label>
                <input type="submit" class="add-submit" value="更新する">
            </form>
        </div>
    </div>
@endsection

@include('layout.table',['item'=>'medium'])