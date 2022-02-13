<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\EtalaseModel;
use App\Models\CartModel;
use App\Http\Requests\Admin\EtalaseRequest;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class EtalaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = EtalaseModel::all();
    
        return view('Pages.admin.etalase.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.admin.etalase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $req = $request->all();

        $data = $request->validate([
            'items_name' => 'required|max:255',
            'description' => 'required',
            'stocks' => 'required|integer|min:0',
            'price' => 'required|integer|min:0'
        ]);

        $data['slug'] = Str::slug($request->items_name);
        $data['current_stocks'] = $request->stocks;
        
        EtalaseModel::create($data);

        Alert::toast('Data berhasil ditambahkan!', 'success');
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
        $item = EtalaseModel::findOrFail($id);

        return view('Pages.admin.etalase.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtalaseRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->items_name);
    
        EtalaseModel::findOrFail($id)->update($data);

        Alert::toast('Data berhasil diubah!', 'success');
        return redirect()->route('etalase.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = EtalaseModel::findOrFail($id);
        
        $itemInCart = CartModel::where('item_id', $id)->first();
        if($itemInCart) {
            Alert::toast('item tidak dapat dihapus karena sedang didalam transaksi!', 'error');
            return redirect()->route('etalase.index');
        } else {
            $item->delete();
            Alert::toast('Data berhasil dihapus!', 'success');
            return redirect()->route('etalase.index');
        }

    }
}
