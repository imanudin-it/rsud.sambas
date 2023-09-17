
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title> RSUD Sambas &mdash; {{ $title }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/admin/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/admin/modules/jquery-selectric/selectric.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>

<style>
  body{
    background-image: url("https://rsudsambas.co.id/stisla/include/img/bg-batik.png");
background-repeat: repeat;
    }
</style>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                
              
              <div class="login-brand">
                <img src="{{ asset('assets/admin/img/rs/rsud-2023.png') }}" alt="logo" width="100" class="mb-3 shadow-light rounded-circle">
                <br>
            <h1> RSUD SAMBAS </h1>
        </div>
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible show fade mb-1">
                <div class="alert-body">
                  {{ session('success') }}
                </div>
              </div>
              @endif
            
              @if(session()->has('loginFail'))
              <div class="alert alert-danger alert-dismissible show fade mb-1">
                  <div class="alert-body">
                    {{ session('loginFail') }}
                  </div>
                </div>
                @endif
            
                <div class="card card-primary" style="background-color: #ffffff80">
              <div class="card-header"><h4><i class="fa fa-sign"></i> &nbsp; Login :</h4></div>

              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                     &bull; Login
                    </button>
                  </div>
                </form>
                

              </div>
              
              <div class="card-footer bg-light" align="center">
                Belum punya akun ? <a href="/register">Silahkan Daftar</a> </div>
            </div>
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
  <script src="{{ asset('assets/admin/modules/jquery.min.js') }}}"></script>
  <script src="{{ asset('assets/admin/modules/popper.js') }}}"></script>
  <script src="{{ asset('assets/admin/modules/tooltip.js') }}}"></script>
  <script src="{{ asset('assets/admin/modules/bootstrap/js/bootstrap.min.js') }}}"></script>
  <script src="{{ asset('assets/admin/modules/nicescroll/jquery.nicescroll.min.js') }}}"></script>
  <script src="{{ asset('assets/admin/modules/moment.min.js') }}}"></script>
  <script src="{{ asset('assets/admin/js/stisla.js') }}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('assets/admin/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}}"></script>
  <script src="{{ asset('assets/admin/modules/jquery-selectric/jquery.selectric.min.js') }}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/admin/js/page/auth-register.js') }}}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/admin/js/scripts.j') }}}s"></script>
  <script src="{{ asset('assets/admin/js/custom.js') }}}"></script>
</body>
</html>