<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EtalaseModel;
use App\Models\TransactionsModel;

class DashboardController extends Controller
{
    public function index(Request $request){
        return view('pages.admin.dashboard', [
            'produk'    => EtalaseModel::count(),
            'cod'       => TransactionsModel::where('transaction_type', '=', 'COD')->count(),
            'transfer'  => TransactionsModel::where('transaction_type', '=', 'TRANSFER')->count(),
            'complete'  => TransactionsModel::where('transaction_status', '=', 'SUCCESS')->count(),
            'canceled'   => TransactionsModel::where('transaction_status', '=', 'CANCELE')->count(),
        ]);
    }
}
