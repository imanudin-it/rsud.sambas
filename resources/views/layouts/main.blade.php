<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{ $title }} - RSUD Sambas</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/assets/owl.theme.default.min.css') }}"> --}}

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <link 
  href="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.min.css"
  rel="stylesheet"
>
<script
  src="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.iife.js"
  defer
  init
></script>

<link rel="stylesheet" href="{{ asset('assets/owlcarousel/owlcarousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/owlcarousel/owlcarousel/assets/owl.theme.default.min.css') }}">

    <style>
        /* Menambahkan background image ke seluruh body */
.hero {
    background-image: url('{{ asset('assets/img/backgrounds/creative.png') }}'); /* Ganti 'path/to/your/image.jpg' dengan lokasi gambar Anda */
    background-size: 100%; /* Menyesuaikan gambar dengan ukuran elemen body */
    background-repeat: repeat;
    color: #566a7f; /* Warna teks pada latar belakang gelap */
    opacity : 0.5em;
   }

/* Gaya teks di dalam body */
.hero h1 {
    font-size: 36px;
    font-weight: bold;
}

.card.link:hover {
    transform: scale(1.05);
    background-color: rgb(244, 243, 207);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.bt-primary {
  border-top : solid 2px #3c598c;
}
.bl-primary {
  border-left : solid 3px #3c598c;
}

.img-container {
width: 100%; /* Lebar container */
max-height: 200px; /* Tinggi maksimal */
overflow: hidden; /* Untuk memotong gambar yang berlebihan */
}

.img-container img {
width: 100%; /* Gambar mengisi lebar container */
height: 100%; /* Gambar mengisi tinggi container */
object-fit: cover; /* Gambar tetap proporsional dan potong sesuai container */
}

.offcanvas{
    background-image: url('{{ asset('assets/img/backgrounds/creative.png') }}'); 
    background-size: 100%; 
    color: #566a7f; /* Warna teks pada latar belakang gelap */
    opacity : 0.5em;
  }
  .fs-85 {
  font-size: 85%;
  color: rgba(44, 107, 173, 0.863);
}
</style>

  </head>

  <body class="hero">
{{--     
    <div id="background-loading">
        <span class="loading-text">LOADING</span>
        <div class="loader"></div>
    </div> --}}

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
          <!-- Layout container -->
          <div class="layout-page">
            <!-- Navbar -->
  
            <nav
              class="layout-navbar p-2 p-lg-4 container-xxxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
              id="layout-navbar"
            >
              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <form action="/posts">
                   
                <div class="navbar-nav align-items-center">
                  <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0" type="submit"></i>
                    <input
                      type="text"
                      class="form-control border-0 shadow-none"
                      placeholder="Pencarian Postingan..."
                      aria-label="Search..."
                      name="search"
                      value="{{ request('search') }}"
                    />
                  </div>
                </div>
                </form>
                <!-- /Search -->
  
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Place this tag where you want the button to render. -->
                   
                    <li class="nav-item lh-1 me-2">
                       <a class="btn bg-label-primary rounded-pill btn-sm" href="/">
                          <span class="w-px-40 h-auto"> <i class='fs-3 bx bx-home' ></i> </span>
                        </a>
                    </li>
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                          <img src="{{ asset('storage/rsud-siap.png') }}" alt="" class="w-px-40 h-auto rounded-circle">
                        </div>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                          <a class="dropdown-item" href="#">
                            <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                  <img src="{{ asset('storage/rsud-siap.png') }}" alt="" class="w-px-40 h-auto rounded-circle">
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <span class="fw-semibold d-block">RSUD Sambas</span>
                                <small class="text-muted"><i class='bx bx-bookmark'></i> Pengunjung</small>
                              </div>
                            </div>
                          </a>
                        </li>
                        
                        <li>
                          <div class="dropdown-divider"></div>
                        </li>
                        {{-- <li>
                          <a class="dropdown-item" href="/login/">
                            <i class='bx bx-log-in-circle me-2'></i>
                            <span class="align-middle"> Masuk</span>
                          </a>
                        </li> --}}
                      </ul>
                    </li>
                    <!-- User -->
                                  </ul>
              </div>
            </nav>
  
            <!-- / Navbar -->
  
            <!-- Content wrapper -->
            <div class="content-wrapper">
              <!-- Content -->
                @yield('container')
            </div>
</body>

@php
use Illuminate\Support\Facades\Storage;

$slide = Storage::files('public/slide-footer/');

// Filter hanya file gambar
$slide = array_filter($slide, function ($file) {
    return preg_match('/\.(jpg|jpeg|png|gif)$/i', $file);
});

// Menghapus prefix "public/" agar bisa digunakan di `asset()`
$slide = array_map(function ($file) {
    return str_replace('public/', '', $file);
}, $slide);
@endphp

<div class="mb-4 loop-footer owl-carousel owl-theme">
    @foreach ($slide as $gambar)
        <div class="item">
            <div class="card h-100 mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="card-img card-img-left" src="{{ asset("storage/$gambar") }}" alt="Slide Image">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


<footer class="footer text-muted bg-dark p-0 mb-0">
  {{-- <img src="{{ asset('storage/footer3.jpg') }}" width="100%"> --}}
    <div
      class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3"
    >
    
      <div>
        
        <h2
          class="footer-text text-muted fw-bolder mb-1"
          >RSUD SAMBAS</h2
        > <br> <small> &copy; {{ date('Y') }} &trade; </small>
      </div>
      <div>
        <div class="dropdown dropup footer-link me-3">
          <a
            href="https://facebook.com/imanudin.it" class="text-muted"
          >
          <i class='bx bx-terminal'></i> IMANUDIN - SIMRS - PKRS </a>
        </a>
          
        </div>
        
      </div>
    </div>
  </footer>
<!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="{{ asset('assets/js/load-jquery.js') }}"></script>
    {{-- <script>
        $(window).load(function(){
            $('#background-loading').fadeOut("slow");
        });
    </script> --}}

    <script src="{{ asset('assets/owlcarousel/vendors/jquery.min.js') }}"></script>
<script src="{{ asset('assets/owlcarousel/owlcarousel/owl.carousel.min.js') }}"></script>

<script>
  $('.loop').owlCarousel({
    lazyLoad:true,
    center: true,
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
        600:{
            items:3
        },
        300:{
            items:2
        }
    }
});
$('.loop-header').owlCarousel({
    lazyLoad:true,
    center: true,
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:4000,
    dots: false,
    responsive:{
        600:{
            items:2
        }
    }
});


$('.loop-dokter').owlCarousel({
    lazyLoad:true,
    center: true,
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    dots: false,
    responsive:{
      600:{
            items:3
        },
      300:{
            items:2,
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
        }
    }
});
</script>

<script>
    $(document).ready(function() {
        // Tangani saat formulir dikirim
        $('#cari').click(function() {
            
            var tglPeriksa = $('#tglPeriksa').val();
            var kodePoli = $('#kodePoli').val();
            var namaPoli = $('#kodePoli option:selected').text();

            if (tglPeriksa === '' || kodePoli === '') {
              $('#response').show();

              $('#response').html('<div class="pt-3 alert alert-danger" align="center"> <i class="bx bx-error bx-tada"></i> Tgl Periksa atau Spesialis tidak boleh kosong ! </div>');
                      return;
            }
            // Tampilkan elemen "loading"
              $('#loading').show();
              $('#response').hide();
              
            // Lakukan permintaan Ajax
            $.ajax({
                type: 'GET',
                url: '/jadwal-dokter/' + kodePoli + '/' + tglPeriksa,
                dataType: 'json', // Menentukan tipe data yang diharapkan dari respons
                success: function(data) {
                  // Sembunyikan elemen "loading" setelah permintaan selesai
                  $('#loading').hide();
                  $('#response').show();

                  if (data.metadata) {
                      $('#response').html('<div class="pt-3 alert alert-danger" align="center"> ' + namaPoli + ' : ' + tglPeriksa + ' <hr class="text-muted"> <i class="bx bx-error bx-tada"></i> Tidak ada jadwal atau dokter tidak tersedia.</div>');
                      return;
                  }
                // Tangani respons yang diterima
                    var responseHtml = '<div class="card mb-1 p-0"> <div class="bg-label-primary text-center card-header mb-1"> ' + data[0].namahari + ', ' + tglPeriksa + ' : </div> <div class="card-body p-1"> <ul class="list-group"> ';
                    $.each(data, function(index, jadwal) {
                        responseHtml += '<li class="list-group-item d-flex justify-content-between align-items-center"><small> <i class="bx bxs-user-circle"></i> ' + jadwal.namadokter + '  </small> <span class="badge bg-success"> BUKA </span></li>';
                    });
                    responseHtml += '</ul></div>';
                    responseHtml += ' <div class="card-footer p-3 bg-label-secondary"><small class="text-muted"> Sumber : <br> Jadwal Dokter dari Sistem BPJS Kesehatan</small></div> </div>';
                    $('#response').html(responseHtml); // Menampilkan respons ke elemen dengan id "response"
                },
                error: function(xhr, textStatus, errorThrown) {
                    // Sembunyikan elemen "loading" jika terjadi kesalahan
                    $('#loading').hide();
                    $('#response').show();
// Tangani kesalahan jika ada
                    $('#response').html('Terjadi kesalahan: ' + textStatus);
                }
            });
        });
    });

    $(".loop-footer").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive:{
                0:{ items:1 },
                600:{ items:2 },
                1000:{ items:3 }
            }
        });
    
    </script>

<script>
  $(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>
  </body>
</html>
