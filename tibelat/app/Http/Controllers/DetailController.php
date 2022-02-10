<?php

namespace App\Http\Controllers;

use App\Models\EtalaseModel;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug){
        $item = EtalaseModel::with(['galleries'])
                            ->where('slug', $slug)
                            ->firstOrFail();

        return view('Pages.detail', ['item' => $item]);
    }
}
