@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan penjualan</h1>
            <div class="d-flex justify-content-end ">
                <div class="col-7 col-md-7 align-self-end text-center mt-2">
                    <a href="{{ route('export-pdf') }}" class="btn btn-sm btn-danger shadow-sm"> 
                        export pdf
                    </a>
                </div>
                <div class="col-7 col-md-7 align-self-end text-center mt-2">
                    <a href="{{ route('export-excel') }}" class="btn btn-sm btn-success shadow-sm"> 
                        export excel
                    </a>
                </div>
            </div>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Transaction date</th>
                            <th>Total stocks</th>
                            <th>Total item terjual</th>
                            <th>Total sisa</th>
                            <th>Total income</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->date }}</td>
                            <td></td>
                            <td>{{ $item->total_sold }}</td>
                            <td>{{ $item->total_balance }}</td>
                            <td>{{ $item->total_incomes }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
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