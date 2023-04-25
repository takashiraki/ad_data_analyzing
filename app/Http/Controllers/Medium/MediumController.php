<?php

namespace App\Http\Controllers\Medium;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediumController extends Controller
{
    public function index()
    {
        return view('medium.list');
    }
}
