<?php

namespace App\Http\Controllers\Medium;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddMediumController extends Controller
{
    public function index()
    {
        return view('medium.add');
    }

    public function handle(Request $request)
    {

        $create_time = now();
        $validate = $request->validate([
            'medium_name' => ['required', 'string', 'min:1', 'max:32'],
        ]);

        $medium = new Medium([
            'medium_id' => (string)Str::uuid(),
            'medium_name' => $validate['medium_name'],
            'add_medium_day' => $create_time,
            'last_medium_edit_day' => $create_time,
        ]);

        $medium->save();

        return view('medium_add_completed');
    }
}
