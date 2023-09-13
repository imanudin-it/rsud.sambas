<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>RSUD Sambas  &mdash; {{ $title }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>


  <link rel="stylesheet" href="{{ asset('assets/admin/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/modules/fontawesome/css/all.min.css') }}">


  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">
  
 <!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/admin/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/modules/jquery-selectric/selectric.css') }}">

 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<style>

.card:hover {
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1); /* Bayangan saat hover */
}
.article:hover {
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1); /* Bayangan saat hover */
}

body{
  background-image: url("{{ asset('assets/admin/img/bg/bg-admin.jpg') }}");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
trix-toolbar [data-trix-button-group="file-tools"] {
  display: none;
}
</style>
<!-- /END GA -->

</head>

<body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        
        @include('dashboard.layouts.navbar')
        
        <div class="main-sidebar sidebar-style-2">
        @include('dashboard.layouts.menu')
        </div>
  
        <!-- Main Content -->
        <div class="main-content">
         
            @yield('container')
          </div>

  
        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; {{ date('Y') }} <div class="bullet"></div> <i class="fa fa-heart"></i> <div class="bullet"></div> RSUD Sambas <br> Powered By : IManudin <br>
          </div>
         
        </footer>
      </div>
    </div>
    <script src="{{ asset('assets/admin/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/stisla.js') }}"></script>
    

<!-- JS Libraies -->
<script src="{{ asset('assets/admin/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/admin/modules/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/admin/js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('assets/admin/modules/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/admin/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('assets/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('assets/admin/js/page/features-post-create.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    <script>
      document.addEventListener("trix-file-accept", event => {
  event.preventDefault()
})
  </script>
</html>