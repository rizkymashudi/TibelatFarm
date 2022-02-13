@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
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
            <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="items_id">Etalase items</label>
                    <select name="items_id" class="form-control">
                        <option value="{{ $item->items_id }}">id gallery: {{ $item->id }} (jangan diganti)</option>
                        @foreach ($etalaseItems as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->items_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" class="form-control" placeholder="Image">
                    <p class="text-danger mt-2">*ukuran gambar tidak bisa lebih dari 1 mb</p>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Edit
                </button>
                
            </form>
        </div>
    </div>

</div>
@endsection

@push('addon-script')
    
@endpush