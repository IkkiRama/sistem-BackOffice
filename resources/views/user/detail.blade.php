@extends("layouts.main")

@section("title", "Detail User")
@section("body")
	<h1>Detail User</h1>

	<table class="table table-borderles">
			<tr>
				<th>Nama</th>
				<td>{{$user->name}}</td>
			</tr>

			<tr>
				<th>Email</th>
				<td>{{$user->email}}</td>				
			</tr>
			<tr>
				<th>Nama Group | Kota</th>
				<td>{{$user->Group->nama ." | ". $user->Group->kota}}</td>
			</tr>
			<tr>
				<th>No Hp</th>
				<td>{{$user->noHp}}</td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td>{{$user->alamat}}</td>
			</tr>
			<tr>
				<th>Foto</th>
				<td>
					@if($user->profilePic == "default.jpg")
					<div class="rounded-circle defaultProfile">
						<i class="bi bi-person"></i>
					</div>
					@else
					<img class="img-thumbnail" width="100" height="100" src="{{url("/img/$user->profilePic")}}" alt="img user">
					@endif
				</td>
			</tr>
			<tr>
				<th>Aksi</th>
				<td>
					<a href="{{url("/user/$user->id/edit")}}" class="btn btn-warning">Ubah</a>
					<form method="post" action="{{url("/user/$user->id")}}" class="d-inline">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')">Hapus</button>
					</form>
				</td>
			</tr>
		</tbody>
	</table>


	<a href="{{url("/user")}}" class="btn btn-primary">Kembali</a>
@endsection

