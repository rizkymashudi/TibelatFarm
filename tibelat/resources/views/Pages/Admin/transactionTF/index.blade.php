@extends('Layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Transfer</h1>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
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
                        @forelse ($items as $item)
                        <tr>
                            <td>no</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->customers->username }}</td>
                            <td>{{ $item->customers->address }}</td>
                            <td>{{ $item->customers->phone }}</td>
                            <td>{{ $item->etalase_item->items_name}}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->image }}</td>
                            <td>{{ $item->transaction_status }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('transactionTF.edit', $item->id )}}" class="btn btn-info">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                        </tr>
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