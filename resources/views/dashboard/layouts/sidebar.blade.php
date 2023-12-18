<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt4 mb-1 text-muted">
        @can('admin')
        <span>Administrator</span>
      </h6>
      <hr>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
            <span data-feather="home"></span>
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="grid"></span>
            Dashboard
          </a>
        </li>
        <hr>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt4 mb-1 text-muted">
          <span>Data</span>
        </h6>
        <hr>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/diseases*') ? 'active' : '' }}" href="/dashboard/diseases">
            <i class="fa-solid fa-viruses"></i>
            Data Penyakit
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/symptoms*') ? 'active' : '' }}" href="/dashboard/symptoms">
            <i class="fa-solid fa-disease"></i>
            Data Gejala
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
            <i class="fa-solid fa-users"></i>
            Data User
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/rules*') ? 'active' : '' }}" href="/dashboard/rules">
            <span data-feather="file-text"></span>
            Data Rule
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/histories*') ? 'active' : '' }}" href="/dashboard/histories">
            <span data-feather="book-open"></span>
            Data Riwayat
          </a>
        </li>
      </ul>
      @endcan

    </div>
  </nav>