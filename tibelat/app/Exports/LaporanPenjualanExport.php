<?php

namespace App\Exports;

use App\Models\SalesReportModel;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanPenjualanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $items= SalesReportModel::with(['itemStocks'])->select(
                                            DB::raw('DATE(created_at) as date'),
                                            DB::raw('SUM(sold) as total_sold'),
                                            DB::raw('SUM(balance) as total_balance'),
                                            DB::raw('SUM(total_incomes) as total_incomes'))
                                ->groupBy('date')
                                ->orderBy('date', 'desc')
                                ->get();  
        return $items;
    }

    public function headings(): array
    {
        return [
            'Tanggal transaksi',
            'Total Stock',
            'Total terjual / ekor',
            'Total sisa / ekor',
            'Total income'
        ];
    }
}
