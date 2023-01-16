@extends('admin/layout')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Fasilitas Kamar</h4>
          <div class="row">
            <div class="col-md-5">
                <form action="{{ route('fasilitaskamar.store') }}" method="post">
                  @csrf
                    <div class="form-group">
                    <label for="usr">Tipe Kamar :</label>
                    <select class="form-control" name="tipekamar">
                      @foreach ($tipekmr as $tp)
                      <option value="{{ $tp->id}}">{{ $tp->tipe_kamar}}</option>
                      @endforeach
                    </select>                     
                    </div>

                    <div class="form-group">
                    <label for="browser">Fasilitas Kamar :</label>
                    <select class="form-control" name="fasilitas">
                      <option value="Breakfest">Breakfest</option>
                      <option value="Wi-fi">Wi-fi</option>
                      <option value="Bathup">Bathup</option>
                      <option value="TV">TV</option>
                      <option value="AC">AC</option>
                      <option value="Kipas Angin">Kipas Angin</option>
                    </select> 
                    </div>  
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
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

@push('scripts')