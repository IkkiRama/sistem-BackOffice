@extends("layouts.main")

@section("title", "Ubah User ".$user->name)
@section("body")
	<h1>Ubah User {{$user->name}}</h1>

	<form method="post" action="{{url("/user/$user->id")}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		 {{-- PUT|PATCH | user/{user} --}}
	  <div class="mb-3">
	    <label for="name" class="form-label">Nama User</label>
	    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$user->name}}">
	    @error('name') <div class="invalid-feedback"> {{$message}} </div> @enderror
	  </div>

	  <div class="mb-3">
	    <label for="email" class="form-label">Email User</label>
	    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$user->email}}">
	    @error('email') <div class="invalid-feedback"> {{$message}} </div> @enderror
	  </div>

	  <div class="mb-3">
	    <label for="group_id" class="form-label">Group User</label>
	    <select class="form-control" name="group_id">
	    	@foreach($groups as $group)
	    	<option value="{{$group->id}}" {{ $group->id == $user->group_id ? "selected" : ""}}>{{$group->nama. " | ". $group->kota}}</option>
	    	@endforeach
	    </select>
	  </div>

	  <div class="mb-3">
	    <label for="noHp" class="form-label">No Hp</label>
	    <input type="number" class="form-control @error('noHp') is-invalid @enderror" id="noHp" name="noHp" value="{{$user->noHp}}">
	    @error('noHp') <div class="invalid-feedback"> {{$message}} </div> @enderror
	  </div>

	  <div class="mb-3">
	    <label for="profilePic" class="form-label">Foto User</label><br>
	    @if($user->profilePic == "default.jpg")
			<div class="rounded-circle defaultProfile">
				<i class="bi bi-person"></i>
			</div>
			@else
			<img class="img-thumbnail" width="100" height="100" src="{{url("/img/$user->profilePic")}}" alt="img user">
		@endif
	    <input type="file" class="form-control mt-3 @error('profilePic') is-invalid @enderror" id="profilePic" name="profilePic">
	    @error('profilePic') <div class="invalid-feedback"> {{$message}} </div> @enderror
	  </div>


	  <div class="mb-3">
	    <label for="alamat" class="form-label">Alamat</label>
	    <textarea cols="30" rows="5" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{$user->alamat}}</textarea>
	    @error('alamat') <div class="invalid-feedback"> {{$message}} </div> @enderror
	  </div>

	  <button type="submit" class="btn btn-warning">Ubah</button>
	</form>
@endsection

