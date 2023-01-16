@extends('admin/layout')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edits Kamar</h4>
          <div class="row">
            <div class="col-md-5">
                <form action="{{ route('kamar.update',$kamar->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-group">
                      <label for="usr">Tipe Kamar :</label>
                      <input type="text" class="form-control" name="tipekamar" value="{{ $kamar->tipe_kamar}}">
                    </div>
                    <div class="form-group">
                        <label for="usr">Jumlah Kamar :</label>
                        <input type="text" class="form-control" name="jmlkamar" value="{{ $kamar->jml_kamar }}">
                    </div>
                    <div class="form-group">
                      <label for="usr">Harga :</label>
                    <input type="text" class="form-control" name="hargakamar"value="{{ $kamar->harga }}">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Gambar:</label>
                      <input type="file" class="form-control" name="gambar">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
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