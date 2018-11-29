<div class="features" id="features">
	 <div class="container">
		 <div class="tabs-box">
			<ul class="tabs-menu">
				<li><a href="#tab1">Best seller</a></li>
				<li><a href="#tab2">Popular</a></li>
				<li><a href="#tab3">New Arrivals</a></li>
				
			</ul>
			<div class="clearfix"> </div>
		 <div class="tab-grids">
			  <!-- body product -->
			@foreach($barangs as $data)
		 	<div id="tab1" class="tab-grid1">			   				  
				 <a href="/detailproduk"><div class="product-grid">					  
						<div class="more-product-info"><span>NEW</span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">						   
							<img src="{{ asset ('assets/img/barang/' .$data->gambar. '' ) }}" class="img-responsive" alt=""/>
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button class="btns">ORDER NOW</button>
							</h4>
							</div>
						</div></a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust">
								<br>
								<h4>{{ $data->nama_barang }}</h4>
								<br>
								<span class="item_price">Rp.{{ $data->harga }}</span>
							
							</div>													
							<div class="clearfix"> </div>
						</div>
			</div>
			@endforeach
			<!-- body product end -->
	</div>		
</div>
</div>
</div>
</div>
</div>