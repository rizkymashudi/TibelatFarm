<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtalaseController extends Controller
{
    public function index(Request $request){
        return view('Pages.etalase');
    }
}
