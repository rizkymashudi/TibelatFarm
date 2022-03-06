<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\MessageBag;
use App\Models\CartModel;
use App\Models\EtalaseModel;
use App\Models\CustomerModel;
use App\Models\TransactionsModel;
use App\Models\EtalaseGalleryModel;
use App\Models\TransactionsImageModel;
use App\Models\SubTransactionModel;
use App\Models\SalesReportModel;
use App\Http\Requests\CheckOutRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;



class CheckoutController extends Controller
{

    public function index(Request $request){
        $itemCart = CartModel::with(['etalase_item', 'item_image'])->where('user_id', Auth::user()->id)
                                ->get();
        // dd($itemCart->toArray());

        return view('Pages.checkout', ['itemCart' => $itemCart]);
    }

    //masukan item ke cart
    public function process(Request $request, $id){

        $itemProduct = EtalaseModel::with('galleries')->findOrFail($id);

        $itemInCart = CartModel::where('user_id', '=', Auth::user()->id)
                                ->where('item_id', '=', $id)
                                ->first();
        
        //Panggil image default untuk item baru
        $filename = "default-placeholder.png";
        $path = Storage::url('assets/' . $filename);
    
        if(!$itemInCart):
            if(empty($itemProduct->galleries->toArray())):    //check if item has not image
                
                $cart = CartModel::create([
                    'user_id' => Auth::user()->id,
                    'item_id' => $id,
                    'imageitem_id' => 0,
                    'quantity'=> 1
                ]);
            else:
                $cart = CartModel::create([
                    'user_id' => Auth::user()->id,
                    'item_id' => $id,
                    'imageitem_id' => $itemProduct->galleries[0]->id,
                    'quantity'=> 1
                ]);
            endif;
        else:
            $qty = $itemInCart->quantity + 1;
            $cart = CartModel::where('user_id', '=', Auth::user()->id)
                            ->where('item_id', '=', $id)
                            ->update([
                                'quantity' => $qty
                            ]);
        endif;

        Alert::toast('item dimasukan ke keranjang', 'success');
        return redirect()->route('etalase-katalog');        
    }

    //masukan item kecart dan masuk ke page cart
    public function buynow(Request $request, $id){

        $itemProduct = EtalaseModel::with('galleries')->findOrFail($id);

        $itemInCart = CartModel::where('user_id', '=', Auth::user()->id)
                                ->where('item_id', '=', $id)
                                ->first();
        
        if(!$itemInCart):
            $cart = CartModel::create([
                'user_id' => Auth::user()->id,
                'item_id' => $id,
                'imageitem_id' => $itemProduct->galleries[0]->id,
                'quantity'=> 1
            ]);
        else:
            $qty = $itemInCart->quantity + 1;
            $cart = CartModel::where('user_id', '=', Auth::user()->id)
                            ->where('item_id', '=', $id)
                            ->update([
                                'quantity' => $qty
                            ]);
        endif;

        Alert::toast('item dimasukan ke keranjang', 'success');
        return redirect()->route('cart', $itemInCart);  
    }

    //checkout item
    public function create(Request $request, $id){

            if($request->subtotal === "0" || $request === 0){
                return redirect()->back()->withErrors('quanity tidak boleh kosong');
            }

            $data = $request->all();
        
            //cek tipe transaksi
            if($request->flexRadioDefault == 'TRANSFER'): 
                $transaction_type = 'TRANSFER';
                $transaction_status = 'SHIPPING';
            else: 
                
                $transaction_type = 'COD';
                $transaction_status = 'SHIPPING';
            endif;

            //Simpan data transaksi
            $transactioncreate = TransactionsModel::create([
                    'user_id' => Auth::user()->id,
                    'total' => $request['subtotal'],
                    'transaction_status' => $transaction_status,
                    'transaction_type' => $transaction_type,
                    'ongkir' => 10000,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

           
            //simpan bukti tf
            if($request->flexRadioDefault == 'TRANSFER'): 
                $image = $request->file('tfimage')->store('assets/Transfer_image', 'public'); //upload image
                
                TransactionsImageModel::create([
                    'transaction_id' => $transactioncreate->id,
                    'image' => $image
                ]);
            endif;

            

            //simpan detail item transaksi 
            foreach($data['quantity'] as $key => $qt):

                $item = EtalaseModel::where('id', $data['itemid'][$key])->first();

                //kurangi stok dengan qty 
                EtalaseModel::where('id', $data['itemid'][$key])
                            ->update([
                                'current_stocks' => $item->current_stocks - $data['quantity'][$key]
                            ]);
            
                SubTransactionModel::create([
                    'transaction_id' => $transactioncreate->id,
                    'item_id' => $data['itemid'][$key],
                    'item_name' => $item->items_name,
                    'quantity' => $data['quantity'][$key],
                    'price' => $item->price,
                    'total' => $data['total'][$key],
                    
                ]);
    
            endforeach;

            //hapus item di cart
            CartModel::where('user_id', '=', Auth::user()->id)->delete();
       

        Alert::alert('Pembelian berhasil!', 'Item berhasil dicheckout');
        return view('Pages.success');

    }

    //hapus item di cart
    public function remove(Request $request, $id){
        $itemInCart = CartModel::findOrFail($id);
        $itemInCart->delete();

        Alert::toast('item dihapus dari keranjang', 'success');
        return redirect()->back();
    }

    
    public function success(Request $request, $id){
        return view('Pages.success');
    }
}
