@extends('template_backend.home')
@section('title', 'Tambah Post')
@section('sub-judul', 'Tambah Post')
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
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
	  <label for="judul">Judul</label>
	  <input type="text" class="form-control" name="judul" id="judul">
    </div>
    <div class="form-group">
        <label for="category_id">Kategori</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="" holder>Pilih Kategori</option>
            @foreach ($category as $result)
                <option value="{{$result->id}}">{{ $result->name }}</option> 
            @endforeach
        </select>
    </div>
    <div class="form-group">
      <label for="tag_id">Pilih Tag</label>
      <select class="form-control select2" multiple="" name="tag_id[]" id="tag_id">
        @foreach ($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
      </select>
    </div>

      <div class="form-group">
        <label for="content">Konten</label>
        <textarea name="content" id="content" class="form-control" rows="60"></textarea>
      </div>
      <div class="form-group">
        <label for="gambar">Thumbnail</label>
        <input type="file" class="form-control" name="gambar" id="gambar">
      </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan</button>
    </div>
</form>
@endsection