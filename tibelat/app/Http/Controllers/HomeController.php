<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\EtalaseModel;

class HomeController extends Controller
{
    public function index(Request $request){
        $data = EtalaseModel::with(['galleries'])
                            ->take(4)
                            ->get();
                            
        return view('Pages.home', ['data' => $data]);
    }
}
