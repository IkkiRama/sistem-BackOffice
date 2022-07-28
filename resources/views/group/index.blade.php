@extends("layouts.main")

@section("title", "Halaman Group")
@section("body")
	<h1>Daftar Group</h1>

	@if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

	<a href="{{url("/group/create")}}" class="btn btn-primary my-4">Tambah Group</a>
	
	<table id="Group" class="display">
		<thead> 
		    <tr>
		        <th>No</th>
		        <th>Nama</th>
		        <th>Kota</th>
		        <th>Aksi</th>
		    </tr>
		</thead>
		<tbody>
			@foreach($groups as $group)
			<tr>			
				<td>{{$loop->iteration}}</td>
				<td>{{$group->nama}}</td>
				<td>{{$group->kota}}</td>
				<td>
					<a href="{{url("/group/$group->id/edit")}}" class="btn btn-warning">Ubah</a>
					<form method="post" action="{{url("/group/$group->id")}}" class="d-inline">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')">Hapus</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection
@section("script")
	<script type="text/javascript">
		$(document).ready( function () {
		    $('#Group').DataTable();
		} );
	</script>
@endsection