@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Laporan penjualan</h1>
        <div class="d-flex justify-content-end ">
            <div class="col-7 col-md-7 align-self-end text-center mt-2">
                <a href="{{ route('detail-export-pdf') }}" class="btn btn-sm btn-danger shadow-sm"> 
                    export pdf
                </a>
            </div>
            <div class="col-7 col-md-7 align-self-end text-center mt-2">
                <a href="{{ route('detail-export-excel') }}" class="btn btn-sm btn-success shadow-sm"> 
                    export excel
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered stripe order-column hover" id="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>id transaksi</th>
                            <th>item name</th>
                            <th>stock awal</th>
                            <th>terjual</th>
                            <th>sisa</th>
                            <th>(Rp) total penjualan / item</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->transaction_id }}</td>
                            <td>{{ $item->item->items_name }}</td>
                            <td>{{ $item->item->stocks }}</td>
                            <td>{{ $item->sold }}</td>
                            <td>{{ $item->balance }}</td>
                            <td>{{ number_format($item->total) }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
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