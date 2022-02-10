<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\EtalaseModel;
use App\Models\CustomerModel;
use App\Models\TransactionsModel;
use App\Models\EtalaseGalleryModel;
use App\Models\TransactionsImageModel;
use App\Models\SalesReportModel;
use RealRashid\SweetAlert\Facades\Alert;



class CheckoutController extends Controller
{

    public function index(Request $request){

      
        $itemCart = TransactionsModel::with(['etalase_item', 'customers', 'product_image'])
                        ->where('transaction_status', '=', 'IN_CART')
                        ->get();

        
        $customerAddress = TransactionsModel::with(['etalase_item', 'customers', 'product_image'])
                                        ->where('transaction_status', '=', 'IN_CART')
                                        ->first();

        return view('Pages.checkout', ['itemCart' => $itemCart, 'customerAddress' => $customerAddress]);
    }


    //masukan item ke cart
    public function process(Request $request, $id){

        $itemProduct = EtalaseModel::with('galleries')->findOrFail($id);
        
        $customer = CustomerModel::where('user_id', '=', Auth::user()->id)->first();

        // dd($itemProduct->galleries[0]->id);

        if( Auth::user()->name === $customer->username):
            $transaction = TransactionsModel::create([
                'customer_id'   => $customer->id,
                'item_id'       => $id,
                'imageitem_id'  => $itemProduct->galleries[0]->id,
                'quantity'      => 0,
                'total'         => $itemProduct->price,
                'transaction_status' => 'IN_CART',
                'transaction_type'   => 'TRANSFER',
                'created_at'    => now()
            ]);
        else:
            Alert::error('input gagal!', 'sepertinya ada yang salah');
            return redirect()->back();
        endif;

        Alert::toast('item dimasukan ke keranjang', 'success');
        return redirect()->back();        
    }

    public function create(Request $request, $id){
        
        $data = $request->all();
    
        $validated = $request->validate([
            'quantity' => 'required',
            'total' => 'required'
        ]);

        $transaction = TransactionsModel::findOrFail($id);
        $item = EtalaseModel::where('id', $transaction->item_id)->first();

        //cek id_item transaksi di tabel etalase
        if($transaction->item_id === $item->id):
            if($request->flexRadioDefault == 'TRANSFER'):    //cek metode pembayaran
                $image = $request->file('tfimage')->store('assets/Transfer_image', 'public'); //upload image
                //update tabel transaksi
                TransactionsModel::where('id', $id)
                                ->where('transaction_status', 'IN_CART')
                                ->update([
                                    'quantity' => $request->quantity,
                                    'total' => $request->total,
                                    'transaction_status' => 'SUCCESS',
                                    'transaction_type'  => 'TRANSFER',
                                    'updated_at'    => now()
                                ]);

                //simpan bukti tf
                TransactionsImageModel::create([
                    'transaction_id' => $id,
                    'image' => $image
                ]);

                //kurangi stok dengan qty 
                EtalaseModel::where('id', $transaction->item_id)
                            ->update([
                                'current_stocks' => $item->current_stocks - $request->quantity
                            ]);
                
                //update tabel sales report
                SalesReportModel::create([
                    'transaction_id' => $id,
                    'item_id' => $transaction->item_id,
                    'sold' => $request->quantity,
                    'balance' => $item->current_stocks - $request->quantity,
                    'total_incomes' => $request->total,
                    'created_at' => $item->created_at
                ]);
                
            else:
                TransactionsModel::where('id', $id)
                                ->where('transaction_status', 'IN_CART')
                                ->update([
                                    'quantity' => $request->quantity,
                                    'total' => $request->total,
                                    'transaction_status' => 'SHIPPING',
                                    'transaction_type'  => 'COD',
                                    'updated_at'    => Carbon::now()
                                ]);

                EtalaseModel::where('id', $transaction->item_id)
                            ->update([
                                'current_stocks' => $item->current_stocks - $request->quantity
                            ]);

                 //update tabel sales report
                 SalesReportModel::create([
                    'transaction_id' => $id,
                    'item_id' => $transaction->item_id,
                    'sold' => $request->quantity,
                    'balance' => $item->current_stocks - $request->quantity,
                    'total_incomes' => $request->total,
                    'created_at' => $item->created_at
                ]);
            endif;
        endif;

       

        Alert::alert('Pembelian berhasil!', 'Item berhasil dicheckout');
        return view('Pages.success');

    }

    public function remove(Request $request, $id){
        $item = TransactionsModel::findOrFail($id);
        $item->delete();

        Alert::toast('item dihapus dari keranjang', 'success');
        return redirect()->back();
    }


    public function success(Request $request, $id){
        return view('Pages.success');
    }
}
