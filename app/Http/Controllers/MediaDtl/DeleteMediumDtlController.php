<?php

namespace App\Http\Controllers\mediumDtl;

use App\Http\Controllers\Controller;
use App\Models\MediaDtl;
use Illuminate\Http\Request;

class DeleteMediumDtlController extends Controller
{
    public function delete(string $medium_dtl_id)
    {
        $existing_medium_dtl_record = MediaDtl::find($medium_dtl_id);

        if (empty($existing_medium_dtl_record)) {
            //例外
        }

        $before_delete_record = $existing_medium_dtl_record;

        $before_delete_record->delete();

        return view('mediumDtl.delete-completed');
    }
}
