@extends('Lp.layout')
@section('title','LP一覧')

@section('contents')
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <form action="/lps" method="get">
        <input type="text" name="lp_name" placeholder="LP名" value="{{ $view_model->getQueryLpName() }}">
        <input type="text" name="lp_directory" placeholder="LPディレクトリ" value="{{ $view_model->getQueryLpDirectory() }}">
        <button type="submit">検索する</button>
    </form>

    @empty($view_model->getLpRecords())
        <p>no data</p>
    @else
        @foreach ($view_model->getLpRecords() as $lp_record)
            <ul>
                <li>
                    {{ $lp_record->getLpName()->getValue() }} : 
                    {{ $lp_record->getLpDir()->getValue() }}
                    <a href="/lps/{{ $lp_record->getLpId()->getValue() }}/edit">編集</a>
                    <a href="/lps/{{ $lp_record->getLpId()->getValue() }}/delete">削除</a>
                </li>
            </ul>
        @endforeach
    @endempty
@endsection