<?php

namespace App\Http\Controllers\MediumDtl;

use App\Http\Controllers\Controller;
use App\Models\mediaDtl;
use App\Models\Medium;
use illuminate\Support\Str;
use Illuminate\Http\Request;

class AddMediumDtlController extends Controller
{
    public function index()
    {
        $medium = new Medium();

        $all_medium_records = $medium->get_all_records();

        return view('mediumDtl.add', ['data' => $all_medium_records]);
    }

    public function handle(Request $request)
    {
        $validate = $request->validate([
            'medium_dtl_name' => ['required', 'string', 'min:1', 'max:256'],
            'medium_id' => ['required', 'string', 'max:36'],
        ]);

        $medim_dtl = new mediaDtl([
            'medium_dtl_id' => (string)Str::uuid(),
            'medium_dtl_name' => $validate['medium_dtl_name'],
            'medium_id' => $validate['medium_id'],
        ]);

        $medim_dtl->save();

        $all_medium_dtl_records = $medim_dtl->get_all_records();

        return view('mediumDtl.add-completed', ['data' => $all_medium_dtl_records]);
    }
}
