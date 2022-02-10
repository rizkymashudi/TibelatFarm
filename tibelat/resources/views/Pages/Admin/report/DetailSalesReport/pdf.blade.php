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
<h2>Laporan detail penjualan {{ now()->toDateString() }}</h2>


<table id="customers">
  <tr>
    <th>#</th>
    <th>Id transaksi</th>
    <th>Nama item</th>
    <th>Stok awal / ekor</th>
    <th>Terjual / ekor </th>
    <th>Sisa / ekor</th>
    <th>Total penjualan</th>
  </tr>
  
      @php
          $no = 1;
      @endphp
      @foreach($items as $item)
      <tr>
        <td>{{$no}}</td>
        <td>{{ $item->transaction_id}}</td>
        <td>{{ $item->item->items_name }}</td>
        <td>{{ $item->item->stocks }}</td>
        <td>{{ $item->sold }}</td>
        <td>{{ $item->balance }}</td>  
        <td>{{ $item->total_incomes }}</td>
      </tr>
      @endforeach
      @php
            $no++;
      @endphp

</table>

</body>
</html>


