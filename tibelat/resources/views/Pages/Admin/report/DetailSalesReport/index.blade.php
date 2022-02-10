@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Laporan penjualan</h1>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>id transaksi</th>
                            <th>item name</th>
                            <th>stock awal</th>
                            <th>terjual</th>
                            <th>sisa</th>
                            <th>total penjualan</th>
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
                            <td>{{ $item->total_incomes }}</td>
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