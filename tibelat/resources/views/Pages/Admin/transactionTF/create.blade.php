@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah bukti transfer</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card-shadow">
        <div class="card-body">
            <form action="{{ route('transactionTF.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="items_id">Pilih nama customer</label>
                    <select name="transaction_id" id="" required class="form-control">
                        <option value="">Pilih customer</option>
                        @foreach ($transactions as $transaction)
                            <option value="{{ $transaction->id }}">
                                {{ $transaction->customers->username }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" class="form-control" placeholder="Image">
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">
                    Simpan
                </button>
                
            </form>
        </div>
    </div>

</div>
@endsection

@push('addon-script')
    
@endpush