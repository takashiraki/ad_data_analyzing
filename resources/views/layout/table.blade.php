@section('table')
    <div id="table" class="wrap">
        <div class="inner">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>媒体名</th>
                        <th>媒体ID</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="{{ Vite::asset('resources/image/icon01.svg') }}" alt="">テスト太郎</td>
                        <td>testmedia01</td>
                        <td>
                            <ul class="btns">
                                <li><a href="/{{ $item }}/{medium_id}/edit"><p class="btn"><i class="fa-solid fa-pen-nib"></i></p></a></li>
                                <li><a href="/{{ $item }}/{medium_id}/edit"><p class="btn"><i class="fa-solid fa-trash"></i></p></a></li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
@endsection