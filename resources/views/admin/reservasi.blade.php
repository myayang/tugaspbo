@extends('admin/layout')

@section('content')
<h2>Data Pemesanan Kamar</h2>
<table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Telepon</th>
        <th>Tipe Kamar</th>
        <th>Jumlah Kamar</th>
        <th>Tgl Check In</th>
        <th>Tgl Check Out</th>
        <th>Total Bayar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Doe</td>
        <td>John</td>
        <td>Doe</td>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>john@example.com</td>
        <td>Edit / Delete</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Moe</td>
        <td>John</td>
        <td>Doe</td>
        <td>John</td>
        <td>Doe</td>
        <td>mary@example.com</td>
        <td>john@example.com</td>
        <td>Edit / Delete</td>
      </tr>
    </tbody>
  </table>
@endsection