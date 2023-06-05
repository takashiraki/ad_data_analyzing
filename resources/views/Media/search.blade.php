@extends('Media.layout')
@section('title', '媒体管理')

@section('contents')
    <form action="/media" method="get">
        <label>媒体名</label>
        <input type="text" name="medium_name">
        <label>媒体ID</label>
        <input type="text" name="medium_id">
        <button type="submit">検索する</button>
    </form>

    @foreach ($view_model->getMediumRecords() as $media_record)
        <ul>
            <li>{{ $media_record->getMediumName()->getValue() }} : {{ $media_record->getMediumId()->getValue() }} <a
                    href="/medium/{{ $media_record->getMediumId()->getValue() }}/edit">編集する</a><a
                    href="/medium/{{ $media_record->getMediumId()->getValue() }}/delete">削除する</a></li>
        </ul>
    @endforeach
@endsection
