@extends('template_backend.home')
@section('title', 'Edit User')
@section('sub-judul', 'Edit User')
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
<form action="{{route('user.update', $user->id)}}" method="post">
	@csrf
	@method('PUT')
	<div class="form-group">
	  <label for="name">Nama User</label>
	  <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
	</div>
	<div class="form-group">
	  <label for="email">Email</label>
	  <input type="email" class="form-control" name="email" id="email" autocomplete="on" value="{{$user->email}}" readonly="on">
	</div>
	<div class="form-group">
	  <label for="tipe">Tipe</label>
	  <select class="form-control" name="tipe" id="tipe">
	  	<option value="" holder>-Pilih Tipe-</option>
	  	<option value="1" holder @if($user->tipe == 1) selected @endif>Administrator</option>
	  	<option value="0" holder @if($user->tipe == 0) selected @endif>Penulis</option>
	  </select>
	</div>
	<div class="form-group">
	  <label for="password">Password</label>
	  <input type="password" class="form-control" name="password" id="password" autocomplete ="on" value="{{$user->password}}">
	</div>
	<div class="form-group">
	 	<button class="btn btn-primary btn-block">Simpan</button>
	</div>
</form>
@endsection