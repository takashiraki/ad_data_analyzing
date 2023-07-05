@extends('MediaDtl.layout')

@section('title','媒体詳細一覧')

@section('contents')
    <form action="/medium-dtls" method="get">
        <label>媒体詳細ID</label>
        <input type="text" name="medium_dtl_id" placeholder="媒体詳細ID" value="{{ $view_model->getQueryMediumDtlId() }}">
        <label>媒体詳細名</label>
        <input type="text" name="medium_dtl_name" placeholder="媒体詳細名" value="{{ $view_model->getQueryMediumDtlName() }}">
        <label>媒体名</label>
        <input type="text" name="medium_name" placeholder="親媒体名" value="{{ $view_model->getQueryMediumName() }}">

        <button type="submit">検索する</button>
    </form>

    <ul>
        @foreach ($view_model->getMediumDtlRecords() as $medium_dtl_summary_record)
        <li>{{ $medium_dtl_summary_record->getMediumDtlId()->getValue() }} : {{ $medium_dtl_summary_record->getMediumDtlName()->getValue() }} : {{ $medium_dtl_summary_record->getMediumName()->getValue() }}
            <a href="/medium-dtls/{{ $medium_dtl_summary_record->getMediumDtlId()->getValue() }}/edit">編集する</a>
            <a href="/medium-dtls/{{ $medium_dtl_summary_record->getMediumDtlId()->getValue() }}/delete">削除する</a>
        </li>
        @endforeach
    </ul>

    @dd($view_model)
@endsection