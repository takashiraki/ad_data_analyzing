<?php

namespace App\Http\Controllers\Medium;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use illuminate\Support\Str;
use Illuminate\Http\Request;

class AddMediumController extends Controller
{
    public function index()
    {
        $medium = new Medium();

        $records = $medium->get_all_records();

        return view('medium.add', ['data' => $records]);
    }

    public function handle(Request $request)
    {
        $validate = $request->validate([
            'medium_name' => ['required', 'string', 'min:1', 'max:32'],
        ]);

        $medium = new Medium([
            'id' => (string)Str::uuid(),
            'medium_name' => $validate['medium_name'],
        ]);

        $medium->save();

        $records = $medium->get_all_records();

        return view('medium.add-completed', ['data' => $records]);
    }
}
