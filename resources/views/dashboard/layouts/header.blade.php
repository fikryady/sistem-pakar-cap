<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><i class="fa-solid fa-fish-fins"></i> Sistem Pakar</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <<div class="col-md">
      <form action="">
          <div class="input-group">
              <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
              <button class="btn btn-dark" type="submit">Search</button>
            </div>
      </form>
  </div>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-link px-3 bg-dark border-0">Logout <span data-feather="log-out"></span></button>
        </form>
      </div>
    </div>
  </header>