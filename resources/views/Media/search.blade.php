@extends('layout.common')
@section('description', '媒体管理')
@section('title', '媒体管理')
@include('layout.side')
@include('layout.header',['h2'=>'媒体管理'])

@section('form')
    <div id="search" class="wrap">
        <div class="inner">
            <a class="back-btn" href="/medium/search"><p><i class="fa-solid fa-angles-left"></i></p></a>
            <h3 class="hl-03"><img src="{{ Vite::asset('resources/image/btn-search.svg') }}" alt="search">媒体検索</h3>
            <form role="search" class="search-form" action="/media" method="get">
                <label>
                    <span>媒体名</span>
                    <input type="search" class="search-field" placeholder="" value="" name="s">
                </label>
                <label>
                    <span>媒体詳細ID</span>
                    <input type="search" class="search-field" placeholder="" value="" name="s">
                </label>
                <input type="submit" class="search-submit" value="検索">
            </form>
        </div>
    </div>
@endsection

@include('layout.table',['item'=>'medium'])

{{-- @empty($view_model->getMediumRecords())
<p>No data</p>
@else
@foreach ($view_model->getMediumRecords() as $media_record)
    <ul>
        <li>{{ $media_record->getMediumName()->getValue() }} : {{ $media_record->getMediumId()->getValue() }} <a
                href="/medium/{{ $media_record->getMediumId()->getValue() }}/edit">編集する</a><a
                href="/medium/{{ $media_record->getMediumId()->getValue() }}/delete">削除する</a>
        </li>
    </ul>
@endforeach
@endempty --}}