@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi selesai</h1>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered stripe order-column hover" id="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>transaction id</th>
                            <th>customer name</th>
                            <th>address</th>
                            <th>phone</th>
                            <th>item</th>
                            <th>total quantity</th>
                            <th>(Rp) total bayar</th>
                            <th>transaction type</th>
                            <th>status</th>
                            <th>checkout date</th>
                            {{-- <th>action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($transactions as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->customers->name }}</td>
                            <td>{{ $item->customers->address }}</td>
                            <td>{{ $item->customers->phone }}</td>
                            <td>
                                @foreach ($item->item as $name)
                                    {{ $name->item_name}},
                                @endforeach
                            </td>
                            <td>{{ $item->item->sum('quantity') }}</td>
                            <td>{{ number_format($item->total) }}</td>
                            <td>{{ $item->transaction_type }}</td>
                            <td>{{ $item->transaction_status }}</td>
                            <td>{{ $item->updated_at }}</td>
                            {{-- <td>
                                <a href="{{ route('transactionDone.edit', $item->id )}}" class="btn btn-info">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td> --}}
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