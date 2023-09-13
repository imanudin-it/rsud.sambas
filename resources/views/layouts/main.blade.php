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

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

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
              class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
              id="layout-navbar"
            >
              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                  <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                      type="text"
                      class="form-control border-0 shadow-none"
                      placeholder="Pencarian Postingan..."
                      aria-label="Search..."
                    />
                  </div>
                </div>
                <!-- /Search -->
  
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Place this tag where you want the button to render. -->
                   
                    <li class="nav-item">
                         <a class="nav-link" href="/">
                          <span class="w-px-40 h-auto rounded-circle"> <i class='fs-3 bx bx-home' ></i> </span>
                        </a>
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
<footer class="footer bg-light">
    <div
      class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3"
    >
      <div>
        <a
          href="/index/"
          class="footer-text fw-bolder"
          >RSUD SAMBAS</a
        > <br> <small> &copy; {{ date('Y') }} &bull; PKRS &bull; TIM IT </small>
      </div>
      <div>
        <div class="dropdown dropup footer-link me-3">
          <a
            type="button"
            class="btn btn-sm btn-outline-secondary"
            
            href="https://facebook.com/imanudin.it"
          >
            TIM IT &bull; IManudin </a>
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


  </body>
</html>
