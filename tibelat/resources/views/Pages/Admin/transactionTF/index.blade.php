@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Transfer</h1>
        {{-- <a href="{{ route('transactionTF.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> test tambah gambar
        </a> --}}
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered stripe order-column hover compact" id="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>transaction id</th>
                            <th>customer name</th>
                            <th>address</th>
                            <th>phone</th>
                            <th>item</th>
                            <th>quantity</th>
                            <th>total</th>
                            <th>bukti transfer</th>
                            <th>status</th>
                            <th>checkout date</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        {{-- {{ dd($items) }} --}}
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->customers->username }}</td>
                            <td>{{ $item->customers->address }}</td>
                            <td>{{ $item->customers->phone }}</td>
                            <td>{{ $item->etalase_item->items_name}}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total }}</td>
                            <td>
                                @if(isset($item->transactionImage->image))
                                    <img src="{{ Storage::url($item->transactionImage->image) }}" alt="" style="width: 150px" class="img-thumbnail"/>
                                @else
                                    Belum ditransfer 
                                @endif
                            </td>
                            <td>{{ $item->transaction_status }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('transactionTF.edit', $item->id )}}" class="btn btn-info">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">
                                    Data kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush