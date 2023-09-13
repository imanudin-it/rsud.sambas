<div class="divider text-start">
    <div class="divider-text">
      <h5 class="text-muted"> <i class='bx bx-menu-alt-left bx-tada' ></i> Menu : </h5>
    </div>
  </div>
  <div class="row">
    <div class="col-6 col-md-6 col-lg-6">
      <div class="shadow card mb-3 link">
        <div class="card-body">
          <a href="#" data-bs-toggle="offcanvas" data-bs-target="#profil" aria-controls="offcanvasStart">
          <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-primary p-3"><i class='bx bxs-user-detail'></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Profil</span>
             </a>
        </div> 
      </div>
      </a>
    </div>
    {{-- Canvas Profile --}}
                <div
                    class="offcanvas offcanvas-start"
                    tabindex="-1"
                    id="profil"
                    aria-labelledby="offcanvasStartLabel"
                  >
                    <div class="offcanvas-header">
                      <h5 id="offcanvasStartLabel" class="offcanvas-title">Profil</h5>
                      <button
                        type="button"
                        class="btn-close text-reset"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                      <p class="text-center text-white">
                        <img src="{{ asset('storage/rsud.png') }}" width="100%"  class="rounded">
                      </p>
                      <h6> Rumah Sakit Umum Daerah Sambas </h6>
                      <hr class="text-muted">
                      <a href="/profil/sejarah" class="btn btn-primary mb-2  w-100" align="left"><i class='bx bx-history bx-tada' ></i> Sejarah </a>
                      <a href="/profil/visi-misi" class="text-left btn btn-info mb-2  w-100"><i class='bx bx-message-dots bx-tada' ></i> Visi & Misi </a>
                      
                    </div>
                  </div>


    <div class="col-6 col-md-6 col-lg-6">
      <div class="shadow card mb-3 link">
        <div class="card-body">
          <a href="..">
             <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-primary p-3"><i class='bx bx-info-circle'></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Info Pelayanan</span>
          </a>
        </div> 
      </div>
      </a>
    </div>          
    <div class="col-6 col-md-6 col-lg-6">
      <div class="shadow card mb-3 link">
        <div class="card-body">
          <a href="..">
             <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-primary text-white p-3"><i class='bx bxs-timer'></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Jadwal Dokter</span>
          </a>
        </div> 
      </div>
      </a>
    </div>
    
    
    <div class="col-6 col-md-6 col-lg-6">
      <div class="shadow card mb-3 link">
        <div class="card-body">
          <a href="..">
             <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-warning p-3"><i class='bx bxs-contact' ></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Hubungi Kami</span>
          </a>
        </div> 
      </div>
      </a>
    </div>
  </div>