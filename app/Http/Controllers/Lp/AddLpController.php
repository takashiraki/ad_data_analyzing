<?php

namespace App\Http\Controllers\Lp;

use App\Http\Controllers\Controller;
use App\Models\Lp;
use App\Models\LpRemark;
use illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AddLpController extends Controller
{
    public function create()
    {
        return view('lp.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'lp_name' => ['required', 'string', 'min:1', 'max:256'],
            'route' => ['required', 'string', 'min:1', 'max:256'],
            'lp_remark' => ['required', 'string', 'max:256'],
        ]);

        dd($validate);

        $lp_id = (string)Str::uuid();

        try {
            DB::beginTransaction();

            Lp::create([
                'lp_id' => $lp_id,
                'lp_name' => $validate['lp_name'],
                'route' => $validate['route'],
            ]);

            LpRemark::create([
                'lp_id' => $lp_id,
                'lp_remark' => $validate['lp_remark'],
            ]);

            DB::commit();

            return view('lp.add-completed');
        } catch (\Throwable $error) {
            DB::rollBack();
            Log::error($error);
        }
    }
}
