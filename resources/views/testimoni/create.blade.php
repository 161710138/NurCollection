@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
	<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header"><b>Tambah Testimoni </b>
		<div class="card-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
		</div>
	</div>
	<div class="card-body">
		<form action="{{ route('testimoni.store') }}" method="post"  enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group {{$errors->has('nama') ? 'has-error' : '' }}">
				<label class="control-label">Nama</label>
				<input type="text"  name="nama" class="form-control" required>
				@if ($errors->has('nama'))
				<span class="help-block"><strong>{{ $errors->first('nama') }}</strong></span>
				@endif
			</div>

			<div class="form-group {{$errors->has('gambar') ? 'has-error' : '' }}">
				<label class="control-label">Gambar</label>
				<input type="file" id="gambar" name="gambar" class="validate" accept="image/*" required>
				@if ($errors->has('gambar'))
				<span class="help-block"><strong>{{ $errors->first('gambar') }}</strong></span>
				@endif
			</div>

			<div class="form-group {{$errors->has('testimoni') ? 'has-error' : '' }}">
				<label class="control-label">Testimoni</label>
				<textarea id="text" type="ckeditor" name="testimoni" class="ckeditor"required>
			  			</textarea>
				@if ($errors->has('testimoni'))
				<span class="help-block"><strong>{{ $errors->first('testimoni') }}</strong></span>
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

</div>
@endsection