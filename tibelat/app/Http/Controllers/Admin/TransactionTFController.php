<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionsModel;
use App\Models\CustomerModel;
use App\Models\TransactionsImageModel;
use App\Models\SalesReportModel;
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
        $items = TransactionsModel::with(['etalase_item', 'customers', 'transactionImage'])
                                    ->where('transaction_type', '=', 'TRANSFER')
                                    ->get();

        return view('Pages.admin.transactionTF.index', ['items' => $items]);
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
        // dd($transactions);

        return view('Pages.admin.transactionTF.create', ['transactions' => $transactions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionImageRequest $request)
    {
        $data = $request->all();
        dd($request->file('image'));
        $data['image'] = $request->file('image')->store('assets/Transfer_image', 'public');
        TransactionsImageModel::create($data);

        Alert::toast('Success', 'Data berhasil ditambahkan');
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
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();
        TransactionsModel::findOrFail($id)->update($data);
        $salesReportInput = TransactionsModel::findOrFail($id)->where('transaction_status', '=', 'SUCCESS')
                                                            ->first();
        SalesReportModel::create($salesReportInput);

        Alert::toast('Success', 'Data berhasil diubah');
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

        Alert::toast('Success', 'Data berhasil dihapus');
        return redirect()->route('etalase.index');
    }
}
