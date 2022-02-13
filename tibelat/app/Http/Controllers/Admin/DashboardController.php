<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EtalaseModel;
use App\Models\TransactionsModel;
use App\Models\SalesReportModel;
use DB;

class DashboardController extends Controller
{
    public function index(Request $request){
        $incomes = SalesReportModel::join('sub_transactions', 'sub_transactions.id', '=', 'sales_reports.subtransaction_id')
                                ->select(
                                            DB::raw('DATE(created_at) as date'),
                                            DB::raw('SUM(total) as total_incomes'))
                                ->groupBy('date')
                                ->orderBy('date', 'desc')
                                ->first();

        return view('pages.admin.dashboard', [
            'produk'    => EtalaseModel::count(),
            'cod'       => TransactionsModel::where('transaction_type', '=', 'COD')->count(),
            'transfer'  => TransactionsModel::where('transaction_type', '=', 'TRANSFER')->count(),
            'complete'  => TransactionsModel::where('transaction_status', '=', 'SUCCESS')->count(),
            'canceled'  => TransactionsModel::where('transaction_status', '=', 'CANCEL')->count(),
            'incart'    => TransactionsModel::where('transaction_status', '=', 'IN_CART')->count(),
            'incomes'   => $incomes
        ]);
    }
}
