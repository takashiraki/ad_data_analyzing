<?php

namespace App\Http\Controllers\Medium;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditMediumController extends Controller
{
    public function index(string $medium_id)
    {
        $query = DB::table('media');

        $record = $query->where('medium_id', $medium_id)->first();
        // dd($record);

        return view('Medium.edit', ['record' => $record]);
    }

    public function handle(Request $request)
    {
        $medium_id = $request->input('medium_id');
        $validate = $request->validate([
            'medium_name' => ['required', 'string', 'min:1', 'max:32'],
        ]);

        $existing_data = Medium::find($medium_id);

        if (empty($existing_data)) {
            return redirect()->intended('/media');
        }

        $existing_data->medium_name = $validate['medium_name'];

        $new_data = $existing_data;

        $new_data->save();

        return redirect()->intended('/media');
    }
}
