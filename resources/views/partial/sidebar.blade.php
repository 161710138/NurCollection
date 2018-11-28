<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/NUR.jpeg" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
            <a href="/home" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          <li class="nav-item">
            <a href="{{ route('barang.index')}}" class="nav-link">
              <i class="nav-icon  fa fa-cart-plus"></i>
              <p>
                Barang
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('artikel.index')}}" class="nav-link">
              <i class="nav-icon    fa fa-newspaper-o"></i>
              <p>
                Artikel
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('galeri.index')}}" class="nav-link">
              <i class="nav-icon fa fa-file-picture-o"></i>
              <p>
                Galeri
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kategori.index')}}" class="nav-link">
              <i class="nav-icon    fa fa-plus-circle"></i>
              <p>
                Kategori Barang
                </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('testimoni.index')}}" class="nav-link">
              <i class="nav-icon    fa fa-odnoklassniki"></i>
              <p>
                Testimoni
              </p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
             <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           {{ csrf_field() }}                             
           </form>
          <i class="nav-icon fa fa-sign-out text-danger"></i>
          <p class="text">Logout</p>


            </a>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>