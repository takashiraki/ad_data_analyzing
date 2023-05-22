<?php

namespace App\Http\Controllers\Medium;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediumController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('media');
        $records = $query->orderBy('created_at', 'desc')->get();

        return view('medium.list', ['records' => $records]);
    }
}
