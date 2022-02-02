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
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>Checkout</h1>
                            <div class="attandee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Produk</td>
                                            <td>Nama</td>
                                            <td>Kuantitas</td>
                                            <td>Harga</td>
                                            <td>Total</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="FrontEnd/images/cupang2.jpg" height="60">
                                            </td>
                                            <td class="align-middle">Cupang</td>
                                            <td class="align-middle">
                                                <button class="decrement" id="decrement" onclick="stepper(this)"> - </button>
                                                <input class="numberStyle" id="myInput" type="number" min="1" max="99" step="1" value="1" readonly>
                                                <button class="increment" id="increment" onclick="stepper(this)"> + </button>
                                            </td>
                                            <td class="align-middle">Rp. 10.000</td>
                                            <td class="align-middle">Rp. 10.000</td>
                                            <td class="align-middle">
                                                <a href="#">
                                                    <img src="FrontEnd/images/ic_remove.png" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="FrontEnd/images/salmon.jpg" height="60">
                                            </td>
                                            <td class="align-middle">Salmon</td>
                                            <td class="align-middle">
                                                <button class="decrement" id="decrement"> - </button>
                                                <input class="numberStyle" id="myInput" type="number" min="1" max="99" step="1" value="1" readonly>
                                                <button class="increment" id="increment"> + </button>
                                            </td>
                                            <td class="align-middle">Rp. 10.000</td>
                                            <td class="align-middle">Rp. 10.000</td>
                                            <td class="align-middle">
                                                <a href="#">
                                                    <img src="FrontEnd/images/ic_remove.png" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="sub-total">
                                <table class="table table-responsive-sm text-center">
                                    <tbody>
                                        <tr class="d-flex flex-row-reverse">
                                            <th width="30%">Rp. 10.000</th>
                                            <td width="20%" class="text-right">
                                                Sub total: 
                                            </td>
                                        </tr>
                                        <tr class="d-flex flex-row-reverse">
                                            <th width="30%">Rp. 10.000</th>
                                            <td width="20%" class="text-right">
                                                Ongkir: 
                                            </td>
                                        </tr>
                                        <tr class="d-flex flex-row-reverse">
                                            <th width="30%" style="font-weight: bold; font-size: large;">Rp. 10.000</th>
                                            <td width="20%" class="text-right" style="font-weight: bold; font-size: large;">
                                                Total: 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Informasi Pembayaran</h2>
                            <hr>
                            <h7>Metode pembayaran</h7>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked onclick="radioClicked(0)">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <i class="fas fa-credit-card"></i>
                                Transfer banking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="radioClicked(1)">
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
                                <img src="FrontEnd/images/bca.png" alt="" class="bank-image">
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
                        <form action="" id="inputAlamat" style="display: none;">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat pengiriman</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form>

                        </div>
                        <div class="join-container">
                            <a href="success.html" class="btn btn-block btn-buy mt-3 py-2" id="btn-buy">
                                Saya sudah melakukan pembayaran transfer
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="katalog.html" class="text-muted">
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
    <script>
        
        //input stepper
        const myInput = document.getElementById("myInput");
        function stepper(btn){
            let id = btn.getAttribute("id")
            let min = myInput.getAttribute("min")
            let max = myInput.getAttribute("max")
            let step = myInput.getAttribute("step")
            let val = myInput.getAttribute("value")
            let calcStep = (id == "increment") ? (step*1) : (step * -1);
            let newVal = parseInt(val) + calcStep;

            if(newVal >= min && newVal <= max){
                myInput.setAttribute("value", newVal)
            }
        }

        //Payment method
        function radioClicked(x){
            if (x == 0) {
                document.getElementById("inputAlamat").style.display = "none"
                document.getElementById("transferBank").style.display = "block"
                document.querySelector("#btn-buy").textContent = " Saya sudah melakukan pembayaran transfer"
                document.querySelector("#payment-instructions").textContent = "Harap selesaikan pembayaran anda sebelum melanjutkan pembelian anda"
            } else {
                document.getElementById("transferBank").style.display = "none"
                document.getElementById("inputAlamat").style.display = "block"
                document.querySelector("#btn-buy").textContent = "Lakukan pembelian dengan COD"
                document.querySelector("#payment-instructions").textContent = "Harap masukan alamat pengiriman dengan benar sebelum melakukan pembelian"
            }

            return
        }
        
    </script>
@endpush