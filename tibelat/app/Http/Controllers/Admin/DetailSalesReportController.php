<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalesReportModel;
use App\Models\TransactionsModel;
use App\Models\EtalaseModel;
use App\Exports\DetailLaporanPenjualanExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DetailSalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SalesReportModel::with(['item'])->get();  
        return view('Pages.admin.report.DetailSalesReport.index', ['items' => $items]);
    }

    public function exportPDF(){
        
        $items = SalesReportModel::with(['item'])->get();

        $pdf = \PDF::loadView('Pages.admin.report.DetailSalesReport.pdf', ['items' => $items]);
        $pdfname = now()->toDateString();
        return $pdf->download("DetailSalesReport-$pdfname.pdf");
    }

    public function exportExcel() 
    {
        $excelname = now()->toDateString();
        return Excel::download(new DetailLaporanPenjualanExport, "DetailSalesReport-$excelname.xlsx");
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
