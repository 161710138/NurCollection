@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="card card-primary">
			  <div class="card-header"><h3>Data Barang</h3>
			  	<div class="card-title pull-right"><a href="{{ route('barang.create') }}">Tambah</a>
			  	</div>
		    	</div>
			  <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
			  <div class="card-body">
			  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			  	@include('sweet::alert')
			  	<div class="table-responsive table--no-card m-b-40">
				  <table class="table table-borederless table-striped table-earning" id="myTable">
				  	<thead>
			  		<tr>
			  			</div>
			  		<th>No</th>
			  		  <th>Gambar</th>
			  		  <th>Nama Barang</th>
			  		  <th>Deskripsi</th>
			  		  <th>Harga</th>
			  		  <th>Kategori</th>
			  		  <th>Slug</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
				  		@foreach($barangs as $data)
				  	  <tr>
				  	  <td>{{ $no++ }}</td>
				  	    <td><p><a href="" class="thumbnail">
								<img src=" {{ asset ('assets/img/barang/' .$data->gambar. '' ) }}" width="100" height="100"></p></td></a>
				    	<td>{{ $data->nama_barang}}</td>
				    	<td>{!! $data->deskripsi !!}</td>
				    	<td>Rp.{{ $data->harga}}</td>
				    	<td>{{ $data->kategoris->nama_kategori }}</td>
				    	<td>{{ $data->slug }}</td>
						<td>
							<a class="btn btn-warning" href="{{ route('barang.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<form method="post" action="{{ route('barang.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button onclick="return konfirmasi()"type="submit" class="btn btn-danger">Delete</button>
								<script>
									function konfirmasi(){
										tanya = confirm("Yakin ingin menghapus data?");
										if(tanya == true) return true;
										else return false;
									}
								</script>
							</form>
						</td>
				      </tr>

				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection

	    