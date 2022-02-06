@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Transaksi selesai</h1>
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
            <form action="{{ route('transactionDone.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <label for="transaction_status">Status transaksi</label>
                <select name="transaction_status" id="" required class="form-control">
                    <option value="{{ $item->transaction_status }}">jangan diubah ({{ $item->transaction_status }})</option>
                    <option value="PENDING">Pending</option>
                    <option value="SUCCESS">Success</option>
                    <option value="CANCEL">Cancel</option>
                    <option value="SHIPPING">Shipping</option>
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