<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>


<h1>TibelatFarm</h1>
<h2>Laporan penjualan {{ now()->toDateString() }}</h2>


<table id="customers">
  <tr>
    <th>#</th>
    <th>Tanggal transaksi</th>
    <th>Total stok</th>
    <th>Total ikan terjual / ekor</th>
    <th>Total sisa </th>
    <th>Total income</th>
  </tr>
  
      @php
          $no = 1;
      @endphp
      @foreach($items as $item)
        <tr>
            <td>{{$no}}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->total_stocks }}</td>
            <td>{{ $item->total_sold }}</td>
            <td>{{ $item->total_balance }}</td>
            <td>{{ number_format($item->total_incomes) }}</td>
        </tr>  
      @endforeach
      @php
            $no++;
      @endphp

</table>

</body>
</html>


