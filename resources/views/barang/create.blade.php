@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
	<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header"><b>Tambah Barang </b>
		<div class="card-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
		</div>
	</div>
	<div class="card-body">
		<form action="{{ route('barang.store') }}" method="post"  enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group {{$errors->has('gambar') ? 'has-error' : '' }}">
				<label class="control-label">Gambar</label>
				<input type="file" id="gambar" name="gambar" class="validate" accept="image/*" required>
				@if ($errors->has('gambar'))
				<span class="help-block"><strong>{{ $errors->first('gambar') }}</strong></span>
				@endif
			</div>

			<div class="form-group {{$errors->has('nama_barang') ? 'has-error' : '' }}">
				<label class="control-label">Nama Barang</label>
				<input type="text"  name="nama_barang" class="form-control" required>
				@if ($errors->has('nama_barang'))
				<span class="help-block"><strong>{{ $errors->first('nama_barang') }}</strong></span>
				@endif
			</div>

			<div class="form-group {{$errors->has('deskripsi') ? 'has-error' : '' }}">
				<label class="control-label">Deskripsi</label>
				<textarea id="text" type="ckeditor" name="deskripsi" class="ckeditor"required>
			  			</textarea>
				@if ($errors->has('deskripsi'))
				<span class="help-block"><strong>{{ $errors->first('deskripsi') }}</strong></span>
				@endif
			</div>

			<div class="form-group {{$errors->has('harga') ? 'has-error' : '' }}">
				<label class="control-label">Harga</label>
				<input type="text"  name="harga" class="form-control" required>
				@if ($errors->has('harga'))
				<span class="help-block"><strong>{{ $errors->first('harga') }}</strong></span>
				@endif
			</div>

			<div class="form-group {{ $errors->has('id_kategoris') ? ' has-error' : '' }}">
			  			<label class="control-label">Kategori</label>	
			  			<select name="id_kategoris" class="form-control">
			  				<option>Pilih Kategori</option>
			  				@foreach($kategoris as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_kategoris'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_kategoris') }}</strong>
                            </span>
                        @endif
			  		</div>

			<div class="from-group">
				<button type="submit" class="btn btn-primary">Tambah</button>
			</div>

		</form>
	</div>
</div>
</div>
</div>
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
  };
  CKEDITOR.replace( 'text',options);
</script>

</div>
@endsection

