<?php

namespace App\Http\Controllers\MediumDtl;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\MediaDtl;
use App\Models\Medium;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SearchMediumDtlController extends Controller
{
    public function index(Request $request)
    {

        $medium_name_parameer = $request->query('medium_name');
        $medium_dtl_name_parameter = $request->query('medium_dtl_name');
        $medium_dtl_id_parameter = $request->query('medium_dtl_id');

        \DB::enableQueryLog();
        $query = DB::table('media_dtls')
            ->select('media_dtls.medium_dtl_id', 'media_dtls.medium_dtl_name', 'media.medium_id', 'media.medium_name')
            ->leftJoin('media', 'media_dtls.medium_id', '=', 'media.medium_id');

        if (!empty($medium_name_parameer)) {
            $query->where('media.medium_name', 'LIKE', '%' . $medium_name_parameer . '%');
        }

        if (!empty($medium_dtl_name_parameter)) {
            $query->where('media_dtls.medium_dtl_name', 'LIKE', '%' . $medium_dtl_name_parameter . '%');
        }

        if (!empty($medium_dtl_id_parameter)) {
            $query->where('media_dtls.medium_dtl_id', 'LIKE', '%' . $medium_dtl_id_parameter . '%');
        }

        $records = $query->get();

        return view('mediumDtl.search', ['records' => $records]);
    }
}
