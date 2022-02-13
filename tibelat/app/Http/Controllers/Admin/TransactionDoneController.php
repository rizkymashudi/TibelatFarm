<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionsModel;
use App\Models\CustomerModel;
use App\Http\Requests\Admin\TransactionRequest;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionDoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = TransactionsModel::with(['item', 'customers'])
                                    ->where('transaction_status', '=', 'SUCCESS')
                                    ->orWhere('transaction_status', '=', 'CANCEL')
                                    ->get();
    
        return view('Pages.admin.transactionDONE.index', ['transactions' => $transactions]);
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
    public function store(EtalaseRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->items_name);
        TransactionsModel::create($data);

        Alert::toast('Success', 'Data berhasil ditambahkan');
        return redirect()->route('etalase.index');
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

        return view('Pages.admin.transactionDONE.edit', ['item' => $item]);
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
        //
    }
}
