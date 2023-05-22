<?php

namespace App\Http\Controllers\MediumDtl;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchMediumDtlController extends Controller
{
    public function index(Request $request)
    {
        /**
         * Get parameter for make query about medium_name.
         */
        $medium_name_parameter = $request->query('medium_name');


        /**
         * Get parameter for make query about medium_dtl_name.
         */
        $medium_dtl_name_parameter = $request->query('medium_dtl_name');


        /**
         * Get parameter for make query about medium_dtl_id.
         */
        $medium_dtl_id_parameter = $request->query('medium_dtl_id');


        \DB::enableQueryLog();
        $query = DB::table('media_dtls')
            ->select('media_dtls.medium_dtl_id', 'media_dtls.medium_dtl_name', 'media.medium_id', 'media.medium_name', 'media_dtls.created_at')
            ->leftJoin('media', 'media_dtls.medium_id', '=', 'media.medium_id');

        if (!empty($medium_name_parameter)) {
            $query->where('media.medium_name', 'LIKE', '%' . $medium_name_parameter . '%');
        }

        if (!empty($medium_dtl_name_parameter)) {
            $query->where('media_dtls.medium_dtl_name', 'LIKE', '%' . $medium_dtl_name_parameter . '%');
        }

        if (!empty($medium_dtl_id_parameter)) {
            $query->where('media_dtls.medium_dtl_id', 'LIKE', '%' . $medium_dtl_id_parameter . '%');
        }

        $records = $query->orderBy('created_at', 'desc')->get();

        return view('mediumDtl.search', ['records' => $records]);
    }
}
