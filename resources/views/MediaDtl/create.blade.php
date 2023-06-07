@extends('MediaDtl.layout')
@section('title', '媒体詳細登録')

@section('contents')
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <form action="/medium-dtls/store" method="post">
        @csrf
        <label>媒体詳細名</label>
        <input type="text" name="medium_dtl_name">
        <select name="medium_id">

            <option value="">選択してください</option>
            @foreach ($view_model->getMediumRecords() as $medium)
                <option value="{{ $medium->getMediumId()->getValue() }}">
                    {{ $medium->getMediumName()->getValue() }}
                </option>
            @endforeach
        </select>

        <button type="submit">登録する</button>
    </form>
@endsection
