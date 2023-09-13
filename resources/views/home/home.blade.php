@extends('layouts.main')

@section('container')
<style>

  .bg-header{
    background-image: url('{{ asset('storage/home-slide/rsud-direktur.png') }}');
    background-size: cover;
    background-repeat: no-repeat;
    #border-top : solid 03px #3c598c;
}
.card.bg-header {
  display: flex;
  align-items: left; /* Mengatur teks ke tengah secara vertikal */
  justify-content: center; /* Mengatur teks ke tengah secara horizontal */
  text-align: left; /* Untuk mengatur teks menjadi tengah secara horizontal dalam kotak */
  }

.card.bg-header h2 {
  margin: 0; /* Menghapus margin bawaan */
}

.pl-2 {
  padding-left: 10px;
}



.fs-85 {
  font-size: 85%;
  color: rgba(44, 107, 173, 0.863);
}
.img-100 {
  width: 100%;
  height: 135px;
                     
}



@media screen and (max-width: 768px) {
  .card.bg-header {
    background-size: auto 100%; /* Menyesuaikan ketinggian latar belakang dengan tinggi konten */
    padding: 20px; /* Menambahkan ruang di sekitar card saat tampilan mobile */
  }
}
  </style>

<div class="container-xxl flex-grow-1 pt-3"> 
  <div class="card shadow bg-header mb-4" style="height: 240px;">
      <h5 class="pl-2 mb-3 text-white"> Selamat Datang ! </h5>
      <h1 class="fw-bold mb-2 pl-2 text-white" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"> <u> RSUD SAMBAS </u></h1>
      <small> <p class="pl-2 text-white"> <i class='bx bxs-location-plus'></i> Jl. Pendidikan No. 300 - Sambas, Kalimantan Barat </p>
      </small>
  </div>

  
  <div class="row">
    <div class="col-lg-8 col-md-8">
      <div class="divider text-start">
        <div class="divider-text">
          <h5 class="text-muted"> <i class='bx bx-menu-alt-left bx-tada' ></i> Menu : </h5>
        </div>
      </div>
        <div class="row">
          <div class="col-6 col-md-4 col-lg-3">       
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


          <div class="col-6 col-md-4 col-lg-3">
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
          <div class="col-6 col-md-4 col-lg-3">
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
          
          
          <div class="col-6 col-md-4 col-lg-3">
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
          
          <div class="col-12 col-md-8 col-lg-12">
            <div class="shadow card link">
              <div class="card-body p-0">
                <a href="//rsudsambas.co.id/web/pendaftar">
                    <img src="{{ asset('storage/ayo-daftar-online2.png') }}" class="img-100 rounded">
                </a>
              </div> 
            </div>
            </a>
          </div>
          
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
      <div class="divider text-start">
        <div class="divider-text">
          <h5 class="text-muted"> <i class='bx bx-user-voice bx-tada' ></i> Kata Sambutan : </h5>
        </div>
      </div>
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="card-img card-img-left" src="{{ asset('storage/'.$katasambutan->image) }}" alt="Card image" />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $katasambutan->nama }} </h5>
              <p class="card-text">
                {!! str_replace('<div>','',Str::limit($katasambutan->isi, '150', '...')) !!}.
              </p><div class="article-cta text-right">
                <a href="/kata-sambutan"> Lihat Selengkapnya <i class="fas fa-chevron-right"></i> </a>
              </div>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


@endsection