<?php

namespace App\Http\Controllers\Medium;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use Illuminate\Http\Request;

class SearchMediumController extends Controller
{
    public function index(Request $request)
    {
        $medium = new Medium();
        $get_parameter = $request->only('medium_name', 'medium_id');

        if (empty($get_parameter) || ($get_parameter['medium_name'] === null && $get_parameter['medium_id'] === null)) {
            $records = $medium->get_all_records();
        } else {

            if (!empty($get_parameter['medium_name'])) {
                $medium_name = $get_parameter['medium_name'];
            } else {
                $medium_name = null;
            }

            if (!empty($get_parameter['medium_id'])) {
                $medium_id = $get_parameter['medium_id'];
            } else {
                $medium_id = null;
            }

            $records = $medium->get_records($medium_name, $medium_id);
        }

        return view('medium.search', ['data' => $records]);
    }
}
