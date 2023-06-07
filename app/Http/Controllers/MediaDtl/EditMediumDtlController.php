<?php

namespace App\Http\Controllers\mediumDtl;

use App\Http\Controllers\Controller;
use App\Models\MediaDtl;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EditMediumDtlController extends Controller
{
    public function edit(string $medium_dtl_id)
    {
        $query_for_medium_dtl = DB::table('media_dtls');

        $medium_dtl_record = $query_for_medium_dtl->where('medium_dtl_id', $medium_dtl_id)->first();

        $medium_id = $medium_dtl_record->medium_id;

        $query_for_medium = DB::table('media');
        $medium_records = $query_for_medium->get();

        return view('mediumDtl.edit', [
            'medium_dtl_record' => $medium_dtl_record,
            'medium_records' => $medium_records
        ]);
    }

    public function update(Request $request, string $medium_dtl_id)
    {
        $medium_dtl_id_from_request = $request->input('medium_dtl_id');

        $medium_id = $request->input('medium_id');

        $validate = $request->validate([
            'medium_dtl_name' => ['required', 'string', 'min:1', 'max:32'],
        ]);

        if ($medium_dtl_id_from_request !== $medium_dtl_id) {
            //例外
        }

        $exiting_medium_dtl_record = MediaDtl::find($medium_dtl_id);

        if (!empty($medium_dtl_record)) {
            //例外
        }

        $exiting_medium_dtl_record->medium_dtl_name = $validate['medium_dtl_name'];

        $exiting_medium_dtl_record->medium_id = $medium_id;

        $new_medium_dtl_record = $exiting_medium_dtl_record;

        $new_medium_dtl_record->save();

        return redirect()->intended('/medium-dtls');
    }
}
