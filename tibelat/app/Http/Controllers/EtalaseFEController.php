<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtalaseModel;

class EtalaseFEController extends Controller
{
    public function index(Request $request){
        $data = EtalaseModel::with(['galleries'])
                            ->get();
        // $data = [];

        return view('Pages.etalase-frontend', ['data' => $data]);;
    }
}
