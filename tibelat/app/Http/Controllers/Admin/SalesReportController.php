<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalesReportModel;
use App\Models\TransactionsModel;
use App\Models\EtalaseModel;
use App\Exports\LaporanPenjualanExport;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ngambil data dari table sales_report, items, sama sub_transactions / detail transactions
        $items = SalesReportModel::Join('items', 'items.id', '=', 'sales_reports.item_id')
                                    ->Join('sub_transactions', 'sub_transactions.id', '=', 'sales_reports.subtransaction_id')     
                                    ->select(
                                                DB::raw('DATE(sales_reports.created_at) as date'),
                                                DB::raw('SUM(sold) as total_sold'),
                                                DB::raw('SUM(balance) as total_balance'),
                                                DB::raw('SUM(stocks) as total_stocks'),
                                                DB::raw('SUM(sub_transactions.total) as total_incomes'),
                                            )
                                    ->groupBy('date')
                                    ->orderBy('date', 'desc')
                                    ->get();
                                       
        return view('Pages.admin.report.SalesReport.index', ['items' => $items]);
    }

    public function exportPDF(){
        $items = SalesReportModel::Join('items', 'items.id', '=', 'sales_reports.item_id')
                                                        ->select(
                                                                        DB::raw('DATE(sales_reports.created_at) as date'),
                                                                        DB::raw('SUM(sold) as total_sold'),
                                                                        DB::raw('SUM(balance) as total_balance'),
                                                                        DB::raw('SUM(stocks) as total_stocks'),
                                                                        DB::raw('SUM(total_incomes) as total_incomes'))
                                                            ->groupBy('date')
                                                            ->orderBy('date', 'desc')
                                                            ->get();

        $pdf = \PDF::loadView('Pages.admin.report.SalesReport.pdf', ['items' => $items]);
        $pdfname = now()->toDateString();
        return $pdf->download("SalesReport-$pdfname.pdf");
    }

    public function exportExcel() 
    {
        $excelname = now()->toDateString();
        return Excel::download(new LaporanPenjualanExport, "SalesReport-$excelname.xlsx");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
