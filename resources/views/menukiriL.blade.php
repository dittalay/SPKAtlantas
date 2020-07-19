@section('menukiri')
<div class="sidebar">
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

          <li class="nav-header">SISTEM PENDUKUNG KEPUTUSAN</li>
          <li class="nav-item">
            <a href="/spk/kriteria" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                List Kriteria
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/kriteria/bobot" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Bobot Kriteria
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/spk/alternatif" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                List Alternatif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/alternatif/nilai" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Nilai Alternatif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/spk/result" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Hasil SPK
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endsection
