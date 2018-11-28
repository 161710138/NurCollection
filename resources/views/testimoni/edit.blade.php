@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="card card-primary">
			  <div class="card-header">Edit Testimoni
			  	<div class="card-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="card-body">
			  	<form action="{{ route('testimoni.update',$testimonis->id) }}" method="post"  enctype="multipart/form-data" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $testimonis->nama }}"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Gambar</label>
                                @if (isset($testimonis) && $testimonis->gambar)
                                    <p>
                                        <br>
                                    <img src="{{ asset('assets/img/testimoni/'.$testimonis->gambar) }}" style="width:250px; height:250px;" alt="">
                                    </p>
                                @endif
                                <input name="gambar" type="file" value="{{ $testimonis->gambar }}">
                            </div>

                     <div class="form-group {{ $errors->has('testimoni') ? ' has-error' : '' }}">
			  			<label class="control-label">testimoni</label>	
			  			<textarea id="text" type="ckeditor" name="testimoni" class="ckeditor"required> {{ $testimonis->testimoni}}
			  				</textarea>
			  			@if ($errors->has('testimoni'))
                            <span class="help-block">
                                <strong>{{ $errors->first('testimoni') }}</strong>
                            </span>
                        @endif
			  		</div>       
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Edit</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
</div>
@endsection