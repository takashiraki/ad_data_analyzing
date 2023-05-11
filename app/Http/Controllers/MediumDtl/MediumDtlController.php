<?php

namespace App\Http\Controllers\MediumDtl;

use App\Http\Controllers\Controller;
use App\Models\mediaDtl;
use Illuminate\Http\Request;

class MediumDtlController extends Controller
{
    public function index()
    {
        $medium_dtl = new mediaDtl();

        $records = $medium_dtl->get_all_records();

        return view('mediumDtl/list', ['records' => $records]);
    }
}
