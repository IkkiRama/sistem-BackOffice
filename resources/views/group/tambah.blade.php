@extends("layouts.main")

@section("title", "Tambah Group")
@section("body")
	<h1>Tambah Group</h1>

	<form method="post" action="{{url("/group")}}">
		@csrf

	  <div class="mb-3">
	    <label for="nama" class="form-label">Nama Group</label>
	    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old("nama")}}">
	    @error('nama') <div class="invalid-feedback"> {{$message}} </div> @enderror
	  </div>

	  <div class="mb-3">
	    <label for="kota" class="form-label">Kota Group</label>
	    <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{old("kota")}}">
	    @error('kota') <div class="invalid-feedback"> {{$message}} </div> @enderror
	  </div>

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection

