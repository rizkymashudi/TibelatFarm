@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah item etalase</h1>
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
            <form action="{{ route('etalase.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="item name">Nama item</label>
                    <input type="text" class="form-control" name="items_name" placeholder="item name" value="{{ old('items_name') }}">
                </div>
                <div class="form-group">
                    <label for="item name">Deskripsi</label>
                    <textarea rows="10" class="form-control d-block w-100" name="description" placeholder="item description" value="{{ old('description') }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="item name">Stocks</label>
                    <input type="number" class="form-control" name="stocks" placeholder="item stocks" min="0" maxlength="10" value="0">
                </div>
                <div class="form-group">
                    <label for="item name">Harga</label>
                    <input type="number" pattern="[0-9.,]+" class="form-control" name="price" id="item_price" placeholder="item price" min="0" value="0" data-type="number">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
                
            </form>
        </div>
    </div>

</div>
@endsection

@push('addon-script')
    
@endpush