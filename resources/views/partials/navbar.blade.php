
    <nav class="navbar navbar-expand-lg main-navbar">
    <a href="/" class="navbar-brand sidebar-gone-hide"> RSUD SAMBAS</a>
    <ul class="navbar-nav">
      <li><a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <form class="form-inline ml-auto" action="/posts">
      <ul class="navbar-nav">
        
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
      <div class="search-element">
        <input class="form-control" type="search" name="search" value="{{ request('search') }}" placeholder="Search" aria-label="Search" data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        
      </div>
    </form>
    <ul class="navbar-nav navbar-right">
      
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="https://rsudsambas.co.id/web/img/logo.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">RSUD Sambas</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">S &bull; I &bull; A &bull; P</div>
          
          <div class="dropdown-divider"></div>
          @auth
          <a href="/dashboard" class="dropdown-item has-icon text-info">
            <i class="fas fa-list"></i> Dashboard
          </a>
          <form action="/logout" method="POST">
            @csrf
          <button type="submit" class="dropdown-item text-danger">
            <i class="fas fa-sign-out-alt"></i> &nbsp; Logout
          </button>
        </form>
            @else
            <a href="/login" class="dropdown-item has-icon text-info">
              <i class="fas fa-sign-in-alt"></i> Masuk
            </a>
          @endauth
          
        </div>
      </li>
    </ul>
  </nav>
