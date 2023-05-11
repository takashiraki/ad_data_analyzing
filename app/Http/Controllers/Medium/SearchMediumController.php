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
        $get_parameter = $request->only('name', 'id');

        if (empty($get_parameter) || ($get_parameter['name'] === null && $get_parameter['id'] === null)) {
            $records = $medium->get_all_records();
        } else {

            if (!empty($get_parameter['name'])) {
                $name = $get_parameter['name'];
            } else {
                $name = null;
            }

            if (!empty($get_parameter['id'])) {
                $id = $get_parameter['id'];
            } else {
                $id = null;
            }

            $records = $medium->get_records($name, $id);
        }

        return view('medium.search', ['data' => $records]);
    }
}
