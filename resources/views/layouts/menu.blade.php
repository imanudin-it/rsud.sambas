<div class="divider text-start">
    <div class="divider-text">
      <h5 class="text-muted"> <i class='bx bx-menu-alt-left bx-tada' ></i> Menu : </h5>
    </div>
  </div>
  <div class="row">
    <div class="col-6 col-md-3 col-lg-3">       
      <div class="shadow bl-primary card mb-3 link" style="background-color: #6382de7a">
        <div class="card-body">
          <a href="#" data-bs-toggle="offcanvas" data-bs-target="#profil" aria-controls="offcanvasStart">
          <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-primary p-3"><i class='bx bxs-user-detail'></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Profil Rumah Sakit</span>
             </a>
        </div> 
      </div>
      </a>
    </div>
    <div class="col-6 col-md-3 col-lg-3">
      <div class="shadow bl-primary card mb-3 link" style="background-color: #6382de7a">
        <div class="card-body">
          <a href="#" data-bs-toggle="offcanvas" data-bs-target="#infoPelayanan">
             <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-primary p-3"><i class='bx bx-info-circle'></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Informasi Layanan</span>
          </a>
        </div> 
      </div>
      </a>
    </div>          
    
    {{-- <div class="col-6 col-md-3 col-lg-3">
      <div class="shadow bl-primary card mb-3 link">
        <div class="card-body">
          <a href="#"data-bs-toggle="offcanvas" data-bs-target="#jadwalDokter" aria-controls="offcanvasStart">
             <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-primary text-white p-3"><i class='bx bxs-timer'></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Jadwal Dokter</span>
          </a>
        </div> 
      </div>
      </a>
    </div> --}}
    
    
    <div class="col-6 col-md-3 col-lg-3">
      <div class="shadow bl-primary card mb-3 link" style="background-color: #6382de7a">
        <div class="card-body">
          <a href="/tempat-tidur/">
             <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-primary p-3"><i class='bx bx-bed'></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Ketersediaan Tempat Tidur</span>
          </a>
        </div> 
      </div>
      </a>
    </div>
    <div class="col-6 col-md-3 col-lg-3">
      <div class="shadow bl-primary card mb-3 link" style="background-color: #6382de7a">
        <div class="card-body">
          <a href="//rsudsambas.co.id/gallery">
             <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-warning p-3"><i class='bx bx-photo-album' ></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Gallery & Dokumentasi</span>
          </a>
        </div> 
      </div>
      </a>
    </div>
    <div class="col-12 col-md-12 col-lg-12">
      <div class="shadow card mb-3">
        <div class="card-body p-0">
          {{-- <a href="#"data-bs-toggle="offcanvas" data-bs-target="#daftarOnline" aria-controls="offcanvasStart"> --}}
          <a href="/pendaftaran-online-wa">
                <img src="{{ asset('assets/img/daftar-online/daftar-online4.webp') }}" class="img-100 rounded" loading="lazy">
          </a>
        </div> 
      </div>
      </a>
    </div>
    
  </div>
  @include('layouts.canvas')