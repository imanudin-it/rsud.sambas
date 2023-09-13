
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title> RSUD Sambas &mdash; {{ $title }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="assets/img/rs/rsud-2023.png" alt="logo" width="100" class="mb-3 shadow-light rounded-circle">
            <br>
        <h1> RSUD SAMBAS </h1></div>

            <div class="card card-primary">
              <div class="card-header"><h4><i class="fa fa-plus"></i> &nbsp; Registrasi Pengguna</h4></div>

              <div class="card-body">
                <form method="POST" action="/register">
                    
                    @csrf

                  <div class="form-group">
                      <label for="frist_name">Nama</label>
                      <input id="frist_name" type="text" class="form-control @error('nama') is-invalid @enderror " name="name" value="{{ old('email') }}" autofocus>
                      @error('nama') 
                      <div class="invalid-feedback">   {{ $message }}  </div>
                  @enderror</div>
                  
                  <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}">
                        @error('email') 
                            <div class="invalid-feedback">   {{ $message }}  </div>
                        @enderror
                  </div>

                    <div class="form-group">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control pwstrength  @error('password') is-invalid @enderror " data-indicator="pwindicator" name="password">
                        <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                      @error('password') 
                        <div class="invalid-feedback">   {{ $message }}  </div>
                    @enderror
                  </div>

                 

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      &bull; Registrasi Sekarang
                    </button>
                  </div>
                </form>
              </div>
              <div class="card-footer bg-light" align="center">
                Sudah punya akun ? <a href="/login">Silahkan Login</a> </div>
            </div>

            
          </div>
        </div>
      </div>
      <footer class="bg-whitesmoke text-center p-3">
          &mdash; <i class="fa fa-heart"></i> &mdash; &copy; Sakit Umum Daerah Sambas
        </footer>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}}"></script>
  <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/auth-register.js') }}}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.j') }}}s"></script>
  <script src="{{ asset('assets/js/custom.js') }}}"></script>
</body>
</html>