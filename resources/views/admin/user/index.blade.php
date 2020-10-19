@extends('template_backend.home')
@section('title', 'User')
@section('sub-judul', 'User')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		  {{Session('success')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif

<a href="{{ route('user.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
<table class="table table-striped table-hover table-sm table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama User</th>
			<th>Email</th>
			<th>Tipe</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $result => $hasil)
		<tr>
			<td>{{ $result + $users->firstitem()}}</td>
			<td>{{ $hasil->name }}</td>
			<td>{{ $hasil->email }}</td>
			<td>
				@if($hasil->tipe)
				<span class="badge badge-info">Administrator</span>
				@else
				<span class="badge badge-warning">Penulis</span>
				@endif
			</td>
			<td> 
				<form action="{{ route('user.destroy', $hasil->id)}}" method="POST">
					@csrf
					@method('delete')
				<a href="{{route('user.edit', $hasil->id)}}" class="btn btn-success btn-sm">Edit</a>
				<button type="submit" class="btn btn-danger btn-sm">Delete</button>
				</form>
				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $users->links()}}
@endsection