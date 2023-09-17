<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">RSUD SAMBAS</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">RSUD</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link " href="/dashboard"><i class="fas fa-fire"></i> <span> Dashboard </span></a></li>
      <li class="{{ Request::is('dashboard/kata-sambutan') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/kata-sambutan"><i class="fas fa-regular fa-edit"></i> <span> Kata Sambutan </span></a></li>
      <li class="dropdown {{ Request::is('profile*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"> <i class="fas fa-regular fa-gear fa-sm"></i> <span>Profil Umum  </span></a>
         <ul class="dropdown-menu">
          <li class="{{ Request::is('dashboard/profil/sejarah') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/profil/sejarah"><i class="fas fa-regular fa-clock"></i> Sejarah</a></li>
          <li class="{{ Request::is('dashboard/profil/umum') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/profil/umum"><i class="fas fa-regular fa-cube"></i> Visi Misi</a></li>
         </ul>
    
        
      <li class="menu-header">Posts Menu</li>
      <li class="dropdown {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"> <i class="fas fa-regular fa-newspaper fa-sm"></i> <span>Posts </span></a>
         <ul class="dropdown-menu">
          <li class="{{ Request::is('dashboard/posts/create') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/posts/create"><i class="fa fa-regular fa-edit fa-sm"></i> Post Baru</a></li>
          <li class="{{ Request::is('dashboard/posts') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/posts"><i class="fa fa-list fa-sm"></i> Semua Post</a></li>
            
         </ul>
      </li>
      
      <li class="{{ Request::is('dashboard/categories') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/categories"><i class="fas fa-regular fa-folder fa-sm"></i> <span> Kategori</span></a></li>
      <li class="{{ Request::is('dashboard/galeri') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/galeri"><i class="fa fa-image fa-sm"></i> Galeri</a></li>
          
      <li class="menu-header">Lain-Lain</li>
      <li class="dropdown {{ Request::is('informasi*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"> <i class="fas fa-regular fa-info fa-sm"></i> <span>Informasi  </span></a>
         <ul class="dropdown-menu">
          <li class="{{ Request::is('dashboard/informasi-umum') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/informasi-umum">&raquo; Informasi Umum</a></li>
          <li class="{{ Request::is('dashboard/informasi/alur') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/informasi/alur">&raquo;  Alur Pelayanan</a></li>
          <li class="{{ Request::is('dashboard/informasi/dokter') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/informasi/dokter">&raquo;  Dokter & Klinik</a></li>
          <li class="{{ Request::is('dashboard/informasi/tempat-tidur') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/informasi/tempat-tidur">&raquo;  Tempat Tidur</a></li>
        </ul>
      </li> <li class="{{ Request::is('dashboard/services') ? 'active' : '' }}"><a class="nav-link" href="/dashboard/services"><i class="fas fa-list fa-sm"></i> <span> Jenis Pelayanan</span></a></li>
          
      </ul>          
</aside>