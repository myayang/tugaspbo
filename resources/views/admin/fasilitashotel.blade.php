@extends('admin/layout')

@section('content')
<h2>Data Fasilitas Hotel</h2>
  <p><a href="{{route('tambahfasilitashotel')}}" class="btn btn-primary" role="button">+ Tambah Fasilitas Hotel</a></p>
<table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Fasilitas</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>Edit / Delete</td>
      </tr>
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>3</td>
      </tr>
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>3</td>
      </tr>
    </tbody>
  </table>
@endsection