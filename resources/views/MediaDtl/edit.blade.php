@extends('MediaDtl.layout')
@section('title', '媒体詳細編集')

@section('contents')
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <form action="#" method="post">
        @csrf
        <label>媒体詳細名</label>
        <input type="text" name="medium_dtl_name" value="{{ $view_model->getMediumDtlName() }}">
        <select name="medium_id">

            <option value="">選択してください</option>

            @foreach ($view_model->getMediumRecords() as $medium)
                @if ($view_model->getMediumId() === $medium->getMediumId()->getValue())
                    <option value="{{ $medium->getMediumId()->getValue() }}" selected>
                        {{ $medium->getMediumName()->getValue() }}
                    </option>
                @else
                    <option value="{{ $medium->getMediumId()->getValue() }}">
                        {{ $medium->getMediumName()->getValue() }}
                    </option>
                @endif
            @endforeach

        </select>

        <button type="submit">登録する</button>

    </form>

@endsection
