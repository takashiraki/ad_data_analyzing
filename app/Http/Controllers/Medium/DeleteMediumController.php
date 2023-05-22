<?php

namespace App\Http\Controllers\Medium;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use Illuminate\Http\Request;

class DeleteMediumController extends Controller
{
    public function index(string $medium_id)
    {
        $existing_data = Medium::find($medium_id);

        if (empty($existing_data)) {
            return redirect()->intended('/media');
        }

        $before_delete_data = $existing_data;

        $deleted = $before_delete_data->delete();

        return view('Medium.delete-completed');
    }
}
