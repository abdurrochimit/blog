@extends('template_backend.home')
@section('title', 'Edit Tag')
@section('sub-judul', 'Edit Tag')
@section('content')

@if(count($errors)>0)
	@foreach($errors->all() as $error)
		<div class="alert alert-danger" role="alert">
		  {{ $error}}
		</div>
	@endforeach
@endif

@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		  {{Session('success')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif
<form action="{{route('tag.update', $tags->id)}}" method="post">
    @csrf
    @method('patch')
	<div class="form-group">
	  <label for="name">Tag</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$tags->name}}">
	</div>
	<div class="form-group">
	 	<button class="btn btn-primary btn-block">Simpan</button>
	</div>
</form>
@endsection