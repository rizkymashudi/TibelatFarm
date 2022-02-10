@extends('Layouts.checkout')

@section('title', 'checkout')

@section('content')
    <!-- MAIN SECTION -->
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Keranjang
                                </li>
                                <li class="breadcrumb-item active">
                                    Checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0 checkout__cart">
                        <div class="card card-details">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h1>Checkout</h1>
                            <div class="attandee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Produk</td>
                                            <td>Nama</td>
                                            <td>Kuantitas</td>
                                            <td>Harga(Rp) / ekor</td>
                                            <td>Total(Rp)</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($itemCart as $item)
                                        <form action="{{ route('checkout-done', $item->id) }}" method="POST" enctype="multipart/form-data"> {{-- start form --}}
                                            @csrf                                
                                            <tr>
                                                <td>
                                                    <img src="{{ Storage::url($item->product_image->image) }}" height="60">
                                                </td>
                                                <td class="align-middle">{{ $item->etalase_item->items_name }}</td>
                                                <td class="align-middle">
                                                    <button type="button" class="decrement" id="decrement" data-id="{{ $item->id }}" onclick="stepper(this)"> - </button>
                                                    <input name="quantity" class="numberStyle" id="inputQty{{ $item->id }}" type="number" min="1" max="99" step="1" value="1" readonly>
                                                    <button type="button" class="increment" id="increment" data-id="{{ $item->id }}" onclick="stepper(this)"> + </button>
                                                </td>
                                                <td class="align-middle">
                                                    <div id="price{{ $item->id }}" data-price="{{ $item->etalase_item->price }}">
                                                        {{ $item->etalase_item->price }}
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <input type="hidden" id="totaltxt{{ $item->id }}" name="total" class="total" value="" />
                                                    <div id="total{{ $item->id }}" data-price="5000"></div>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $item->id) }}">
                                                        <img src="{{ url('FrontEnd/images/ic_remove.png') }}" alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    Tidak ada item di dalam keranjang
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="sub-total">
                                <table class="table table-responsive-sm text-center">
                                    <tbody>
                                        <tr class="d-flex flex-row-reverse">
                                            <th width="30%" style="display:flex;"><div>Rp.</div> <div class="subtotal"></div></th>
                                            <td width="20%" class="text-right">
                                                Sub total: 
                                            </td>
                                        </tr>
                                        <tr class="d-flex flex-row-reverse">
                                            <th width="30%" style="display:flex">Rp. 10.000</th>
                                            <td width="20%" class="text-right">
                                                Ongkir: 
                                            </td>
                                        </tr>
                                        <tr class="d-flex flex-row-reverse">
                                            <th width="30%" style="font-weight: bold; font-size: large;display:flex;"><div>Rp.</div> <div class="totalall"></div></th>
                                            <td width="20%" class="text-right" style="font-weight: bold; font-size: large;">
                                                Total: 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                    
                    <div class="col-lg-4 checkout__detail">
                        <div class="card card-details card-right">
                            <h2>Informasi Pembayaran</h2>
                            <hr>
                            <h7>Metode pembayaran</h7>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="TRANSFER" id="flexRadioDefault1" checked onclick="radioClicked(0)">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <i class="fas fa-credit-card"></i>
                                    Transfer banking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="COD" id="flexRadioDefault2" onclick="radioClicked(1)">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <i class="far fa-money-bill-alt"></i>
                                    Cash on delivery (COD)
                                </label>
                            </div>
                        <hr>
                        <h2>Instruksi pembayaran</h2>
                        <p class="payment-instructions" id="payment-instructions">
                            Harap selesaikan pembayaran anda sebelum melanjutkan pembelian anda
                        </p>
                        <div class="bank" id="transferBank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('FrontEnd/images/bca.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>PT Tibelat farm Indonesia</h3>
                                    <p>
                                        0888 3234 4344
                                        <br>
                                        Bank Central Asia
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4" id="buktitf">
                            <label for="image">Bukti transfer</label>
                            <input type="file" name="tfimage" id="fileimage" class="form-control fileimage" placeholder="Image">
                        </div>

                            <div class="form-group" id="inputAlamat" style="display: none;">
                                <label for="exampleFormControlTextarea1">Alamat pengiriman</label>
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">
                                        {{-- {{ $customerAddress->customers->address }} --}}
                                    </textarea>
                            </div>
                       

                        </div>
                        <div class="join-container">
                            <button class="btn btn-block btn-buy mt-3 py-2 btn-done" id="btn-buy" type="submit">
                                Saya sudah melakukan pembayaran transfer
                            </button>
                            {{-- <a href="success.html" class="btn btn-block btn-buy mt-3 py-2" id="btn-buy">
                                Saya sudah melakukan pembayaran transfer
                            </a> --}}
                        </div>
                        </form> {{-- end form --}}
                        <div class="text-center mt-3">
                            <a href="{{ route('home') }}" class="text-muted">
                                Batalkan pembelian
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('addon-script')
    <script src="{{ url('FrontEnd/scripts/checkout.js') }}"></script>
    <script>
        //input stepper
        function stepper(btn){

            let dataid = btn.getAttribute("data-id");
            let myInput = document.getElementById("inputQty"+dataid);

            let id = btn.getAttribute("id");
            let min = myInput.getAttribute("min");
            let max = myInput.getAttribute("max");
            let step = myInput.getAttribute("step");
            let val = myInput.getAttribute("value");

            let totalCell = document.getElementById("total"+dataid);
            let price = document.getElementById("price"+dataid);
            var totaltxt = document.getElementsByClassName("total");

            var arrpushtxt = [];
            var totaltxtid = document.getElementById("totaltxt"+dataid);

            console.log(totaltxtid)
            let calcStep = (id == "increment") ? (step*1) : (step * -1);
            let newVal = parseInt(val) + calcStep;

            console.log(myInput)
            console.log(dataid);
            
            if(newVal >= min && newVal <= max){
                myInput.setAttribute("value", newVal)

                let valuePrice = price.getAttribute("data-price");
                let total = myInput.value * valuePrice;
                totalCell.innerHTML = total;
                totalCell.setAttribute("data-price", total);
                totaltxtid.value = total;

                for(var key = 0; key < totaltxt.length; key++){
                    if(totaltxt[key].value == "") {
                        arrpushtxt.push(0);
                    } else {
                    arrpushtxt.push(parseInt(totaltxt[key].value));
                    }
                    
                }
                var sumarr = arrpushtxt.reduce((partialSum, a) => partialSum + a, 0);
                var totalall = sumarr + 10000;
                document.getElementsByClassName("subtotal")[0].innerHTML = sumarr;
                document.getElementsByClassName("totalall")[0].innerHTML = totalall;
                
                
            }

                

        }

        //Payment method
        function radioClicked(x){
            let button = document.querySelector("#btn-buy");
            let address = document.getElementById("inputAlamat");

            button.disabled = true;
            if (x == 0) {
                document.getElementById("inputAlamat").style.display = "none"
                document.getElementById("transferBank").style.display = "block"
                document.getElementById("buktitf").style.display = "block"
                document.querySelector("#btn-buy").textContent = " Saya sudah melakukan pembayaran transfer"
                document.querySelector("#payment-instructions").textContent = "Harap selesaikan pembayaran anda sebelum melanjutkan pembelian anda"
            } else {
                address.style.display = "block"
                document.getElementById("transferBank").style.display = "none"
                document.getElementById("buktitf").style.display = "none"
                button.textContent = "Lakukan pembelian dengan COD"
                document.querySelector("#payment-instructions").textContent = "Harap masukan alamat pengiriman dengan benar sebelum melakukan pembelian"
                
                button.disabled = false;
            }

            return
        }

        let input = document.querySelector(".fileimage");
        let button = document.querySelector(".btn-done");

        button.disabled = true;
        input.addEventListener("change", stateHandle);

        function stateHandle() {
            if(document.querySelector(".fileimage").files.length > 0){
                button.disabled = false;
            } else {
                button.disabled = true;
            }
        }
        
    </script>
@endpush