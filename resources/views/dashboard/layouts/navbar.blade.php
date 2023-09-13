<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
      
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="https://rsudsambas.co.id/web/img/logo.png" class="rounded-circle mr-1">
          <div class="d-sm-none d-lg-inline-block">RSUD Sambas</div></a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">S &bull; I &bull; A &bull; P</div>
            
            <div class="dropdown-divider"></div>
            @auth
            <a href="/" class="dropdown-item has-icon text-info">
              <i class="fas fa-globe"></i> Kunjungi Website
            </a>
            <form action="/logout" method="POST">
              @csrf
            <button type="submit" class="dropdown-item text-danger">
              <i class="fas fa-sign-out-alt"></i> &nbsp; Logout
            </button>
          </form>
              
            @endauth
            
          </div>
        </li>
      </ul>
  </nav>