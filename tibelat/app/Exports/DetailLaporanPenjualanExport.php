<?php

namespace App\Exports;

use DB;
use App\Models\SalesReportModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DetailLaporanPenjualanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $items = SalesReportModel::join('sub_transactions', 'sub_transactions.id', '=', 'sales_reports.subtransaction_id')
                                    ->get();

        ($items->toArray());
        return $items;
    }

    public function headings(): array
    {
        return [
            'ID transaksi',
            'Nama item',
            'Stok awal / ekor',
            'Terjual / ekor',
            'Sisa / ekor',
            'Total penjualan (Rp)',
        ];
    }
}
