@extends("layouts.main")

@section("title", "Halaman Cari User")
@section("body")

<div class="row justify-content-center">
	<div class="col-md-9 text-center">
		<h1>Get User</h1>

		<form method="post" action="{{url("/getUser")}}">
			@csrf
			<div class="input-group mb-3">
			  <input type="text" name="id" class="form-control" placeholder="Cari ID User" 
			  value="{{isset($idUser) ? $idUser : "" }}">
				<button type="submit" class="btn btn-primary">Cari ID User</button>
			</div>
		</form>

		@if(isset($dataUser))
		<div class="mt-5">
			<pre>
				{{$dataUser}}
			</pre>
		</div>
		@endif

	</div>
</div>

@endsection