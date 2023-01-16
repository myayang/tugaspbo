@extends('admin/layout')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Halaman Edit Fasilitas Kamar</h4>
          <div class="row">
            <div class="col-md-5">
                <form action="{{ route('fasilitaskamar.update',$fasilitaskamar->id) }}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group">
                      <label for="usr">Tipe Kamar :</label>
                      <select name="tipekamar" class="form-control">
                        @foreach($kamar as $kmr)
                        <option {{ $fasilitaskamar->id_kamar == $kmr->id ? 'selected' : ''}} 
                         value="{{ $kmr->id}}">{{$kmr->tipe_kamar}} </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label form="browser">Fasilitas Kamar :</label>
                        <select name="fasilitas" class="form-control">
                            <option {{ $fasilitaskamar->nama_fasilitas == 'Breakfest' ? 'selected' : ''}} value"Breakfest">Breakfest</option>
                            <option {{ $fasilitaskamar->nama_fasilitas == 'Wi-fi' ? 'selected' : ''}} value"Wi-fi">Wi-fi</option>
                            <option {{ $fasilitaskamar->nama_fasilitas == 'Bathup' ? 'selected' : ''}} value"Bathup">Bathup</option>
                            <option {{ $fasilitaskamar->nama_fasilitas == 'TV' ? 'selected' : ''}} value"TV">TV</option>
                            <option {{ $fasilitaskamar->nama_fasilitas == 'AC' ? 'selected' : ''}} value"AC">AC</option>
                            <option {{ $fasilitaskamar->nama_fasilitas == 'Kipas Angin' ? 'selected' : ''}} value"Kipas Angin">Kipas Angin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                 
            </div>
            <div class="col-md-7">
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

$push('scripts')

$endpush