@extends("layouts.main")

@section("title", "Tambah User")
@section("body")
	<h1>Tambah User</h1>

	<form method="post" action="{{url("/user")}}">
		@csrf
	  <div class="mb-3">
	    <label for="name" class="form-label">Nama User</label>
	    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old("name")}}">
	    @error('name') <div class="invalid-feedback"> {{$message}} </div> @enderror
	  </div>

	  <div class="mb-3">
	    <label for="email" class="form-label">Email User</label>
	    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old("email")}}">
	    @error('email') <div class="invalid-feedback"> {{$message}} </div> @enderror
	  </div>


	  <div class="mb-3">
	    <label for="group_id" class="form-label">Group User</label>
	    <select class="form-control" name="group_id">
	    	@foreach($groups as $group)
	    	<option value="{{$group->id}}" {{ $group->id == old("group_id") ? "selected" : ""}}>{{$group->nama. " | ". $group->kota}}</option>
	    	@endforeach
	    </select>
	  </div>


	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection

