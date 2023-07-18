<?php

namespace App\Http\Controllers\MediumDtl;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MediumDtlController extends Controller
{
    public function index()
    {
        $query = DB::table('media_dtls')
            ->select('media_dtls.medium_dtl_id', 'media_dtls.medium_dtl_name', 'media.medium_id', 'media.medium_name', 'media_dtls.created_at')
            ->leftJoin('media', 'media_dtls.medium_id', '=', 'media.medium_id');

        $records = $query->orderBy('created_at', 'desc')->get();

        return view('mediumDtl/list', ['medium_dtl_records' => $records]);
    }
}
