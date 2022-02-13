<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionsModel;
use App\Models\CustomerModel;
use App\Models\TransactionsImageModel;
use App\Models\SalesReportModel;
use App\Models\SubTransactionModel;
use App\Http\Requests\Admin\TransactionRequest;
use App\Http\Requests\Admin\TransactionImageRequest;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionTFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = TransactionsModel::with(['item', 'customers', 'transactionImage'])
                                    ->where('transaction_type', '=', 'TRANSFER')
                                    ->get();

        return view('Pages.admin.transactionTF.index', ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transactions = TransactionsModel::with(['etalase_item', 'customers'])
                                        ->where('transaction_type', '=', 'TRANSFER')
                                        ->get();


        return view('Pages.admin.transactionTF.create', ['transactions' => $transactions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //tidak dipakai
    public function store(TransactionImageRequest $request)
    {
        $data = $request->all();
        dd($request->file('image'));
        $data['image'] = $request->file('image')->store('assets/Transfer_image', 'public');
        TransactionsImageModel::create($data);

        Alert::toast('Data berhasil ditambahkan!', 'success');
        return redirect()->route('transactionTF.index');
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
        $item = TransactionsModel::findOrFail($id);

        return view('Pages.admin.transactionTF.edit', ['item' => $item]);
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
        $data = $request->all();
        
        TransactionsModel::findOrFail($id)->update($data);
        
        //ngambil data transaksi TF sukses berdasarkan id
        $salesReportInput = SubTransactionModel::join('transactions', 'transactions.id', '=', 'sub_transactions.transaction_id')
                                                ->join('items', 'items.id', '=', 'sub_transactions.item_id')
                                                ->select('sub_transactions.*', 'items.current_stocks')
                                                ->where('transactions.id', '=', $id)
                                                ->where('transactions.transaction_status', '=', 'SUCCESS')
                                                ->get();
    
        foreach($salesReportInput as $key => $report):
            //update data transaksi TF sukses ke salesreport
            SalesReportModel::create([
                'transaction_id' => $report->transaction_id,
                'subtransaction_id' => $report->id,
                'item_id'   => $report->item_id,
                'sold'  => $report->quantity,
                'balance' => $report->current_stocks
            ]);
        endforeach;

        Alert::toast('Data berhasil diubah', 'success');
        return redirect()->route('transactionTF.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TransactionsModel::findOrFail($id);
        $item->delete();

        Alert::toast('data berhasil dihapus!', 'success');
        return redirect()->route('etalase.index');
    }
}
