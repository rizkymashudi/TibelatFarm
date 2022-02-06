@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit status transaksi TF</h1>
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
            <form action="{{ route('transactionTF.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="transaction_id">ID transaksi</label>
                    <input class="form-control" type="text" value="{{ $item->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="customer_name">Customer name</label>
                    <input class="form-control" type="text" value="{{ $item->customers->username }}" readonly>
                </div>
                <div class="form-group">
                    <label for="item">Item</label>
                    <input class="form-control" type="text" value="{{ $item->etalase_item->items_name }}" readonly>
                </div>
        
                <label for="transaction_status">Status transaksi</label>
                <select name="transaction_status" id="" required class="form-control">
                    <option value="{{ $item->transaction_status }}">{{ $item->transaction_status }}</option>
                    <option value="SUCCESS">Success</option>
                    <option value="CANCEL">Cancel</option>
                </select>
                <button type="submit" class="btn btn-primary btn-block mt-4">
                    Edit
                </button>
                
            </form>
        </div>
    </div>

</div>
@endsection

@push('addon-script')
    
@endpush