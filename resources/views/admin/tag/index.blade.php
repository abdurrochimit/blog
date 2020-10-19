@extends('template_backend.home')
@section('title', 'Tag')
@section('sub-judul', 'Tag')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		  {{Session('success')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif

<a href="{{ route('tag.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
<table class="table table-striped table-hover table-sm table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Tag</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($tag as $result => $hasil)
		<tr>
			<td>{{ $result + $tag->firstitem()}}</td>
			<td>{{ $hasil->name }}</td>
			<td> 
				<form action="{{ route('tag.destroy', $hasil->id)}}" method="POST">
					@csrf
					@method('delete')
				<a href="{{route('tag.edit', $hasil->id)}}" class="btn btn-success btn-sm">Edit</a>
				<button type="submit" class="btn btn-danger btn-sm">Delete</button>
				</form>
				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $tag->links()}}
@endsection