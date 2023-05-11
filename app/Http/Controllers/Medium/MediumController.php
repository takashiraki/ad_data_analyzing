<?php

namespace App\Http\Controllers\Medium;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use Illuminate\Http\Request;

class MediumController extends Controller
{
    public function index(Request $request)
    {
        $medium = new Medium();

        $records = $medium->get_all_records();

        return view('medium.list', ['data' => $records]);
    }
}
