<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello () {
        return view('hello.index',['message' => 'Hello!!']);
    }

    public function post (Request $request) {
        $data = [
            'msg' => $request->msg
        ];

        return view('hello.index',$data);
    }
}
