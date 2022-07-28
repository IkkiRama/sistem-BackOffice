@extends("layouts.main")

@section("title", "Halaman User")
@section("body")
	<h1>Daftar User</h1>

	@if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

	<a href="{{url("/user/create")}}" class="btn btn-primary my-4">Tambah User</a>
	<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		Import Data
	</button>


	<table id="User" class="display">
		<thead> 
		    <tr>
		        <th>No</th>
		        <th>Nama</th>
		        <th>Email</th>
		        <th>Aksi</th>
		    </tr>
		</thead>
		<tbody>
			@foreach($users as $user)
		    <tr>
		        <td>{{$loop->iteration}}</td>
		        <td>{{$user->name}}</td>
		        <td>{{$user->email}}</td>
		        <td>
		        	<a href="{{url("/user/$user->id")}}" class="btn btn-primary">Detail</a>
		        </td>
		    </tr>
		    @endforeach
		</tbody>
	</table>

	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Import User</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	      	<form action="{{url("/user/import")}}" enctype="multipart/form-data" method="post">
	      		@csrf
	      		<input type="file" class="form-control" name="data_user" >
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary">Kirim</button>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection
@section("script")
	<script type="text/javascript">
		$(document).ready( function () {
		    $('#User').DataTable();
		} );
	</script>
@endsection