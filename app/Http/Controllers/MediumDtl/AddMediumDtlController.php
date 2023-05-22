<?php

namespace App\Http\Controllers\MediumDtl;

use App\Http\Controllers\Controller;
use App\Models\mediaDtl;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Str;
use Illuminate\Http\Request;

class AddMediumDtlController extends Controller
{
    public function index()
    {
        $query = DB::table('media');
        $records = $query->orderBy('created_at', 'desc')->get();

        return view('mediumDtl.add', ['records' => $records]);
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

        return view('mediumDtl.add-completed');
    }
}
