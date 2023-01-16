@extends('admin/layout')

@section('content')
<h2>Data Kamar</h2>
  <p><a href="{{route('fasilitaskamar.create')}}" class="btn btn-primary" role="button">+ Tambah Fasilitas Kamar</a></p>
<table id="tabelfasilitaskamar" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tipe Kamar</th>
            <th>Fasilitas Kamar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @php
        $i = 1;
     @endphp
      @forelse ($faskamars as $faskmr)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $faskmr->faskam->tipe_kamar }}</td>
                                    <td>{{ $faskmr->nama_fasilitas}}</td>
                                    <td>
                                        <form action="{{ route('fasilitaskamar.destroy', $faskmr->id) }}" method="post">
                                            <a href="{{ route('fasilitaskamar.edit', $faskmr->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('yakin hapus data ?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data fasilitas kamar tidak tersedia</td>
                                </tr>
                                @endforelse
    </tbody>
  </table>
@endsection

@push('scripts')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    "X-CRSF-TOKEN": $('meta[name="token"]').attr('content')
                }
            });

            $(document).ready(function () {
                var table = $('#tabelfasilitaskamar').DataTable();
            });
        });
    </script>
@endpush