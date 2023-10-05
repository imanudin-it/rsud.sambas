@extends('layouts.main')

@section('container')
<!-- Error -->
<div align="center">
<div class="container-xxl container-p-y">

    <div class="card pt-3 misc-wrapper">
      <h2 class="mb-2 mx-2">Halaman tidak ditemukan :(</h2>
      <p class="mb-4 mx-2">Uos .. 😖 Silahkan kembali ke Beranda</p>
      <div class="mt-3">
        <img
          src="{{ asset('assets/img/illustrations/page-misc-error-light.png') }}"
          alt="page-misc-error-light"
          width="500"
          class="img-fluid"
          data-app-dark-img="illustrations/page-misc-error-dark.png"
          data-app-light-img="illustrations/page-misc-error-light.png"
        />
      </div>
    </div>
  </div>
</div>
  <!-- /Error -->
  @endsection