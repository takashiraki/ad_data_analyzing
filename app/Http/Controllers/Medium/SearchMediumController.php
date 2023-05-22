<?php

namespace App\Http\Controllers\Medium;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchMediumController extends Controller
{
    public function index(Request $request)
    {
        /**
         * Get parameter for make query about medium_name.
         */
        $medium_name_parameter = $request->query('medium_name');


        /**
         * Get parameter for make query about medium_id.
         */
        $medium_id_parameter = $request->query('medium_id');

        $query = DB::table('media');

        if (!empty($medium_name_parameter)) {
            $query->where('medium_name', 'LIKE', '%' . $medium_name_parameter . '%');
        }

        if (!empty($medium_id_parameter)) {
            $query->where('medium_id', 'LIKE', '%' . $medium_id_parameter . '%');
        }

        $records = $query->orderBy('created_at', 'desc')->get();
        return view('medium.search', ['records' => $records]);
    }
}
