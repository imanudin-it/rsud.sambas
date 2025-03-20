@extends('layouts.main')

@section('container')
<div class="p-lg-4 container-xxxl flex-grow-1 pt-3">
  <div class="row">
    <div class="col-lg-8 col-md-8">
      <div class="divider text-center">
        <div class="divider-text">
            <h5 class="text-muted fw-bold"> <i class='bx bx-info-circle bx-tada' ></i> {{ $title }} : </h5>
        </div>
    </div>
      <div class="card p-3 mb-4">
        <img alt="image" src="{{ asset('/storage/struktur-organisasi.jpeg') }}" width="100%">
      </div>
        </div>
        <div class="col-lg-4 col-md-4">
            @include('layouts.menu-kanan')
        </div>
            {{-- @include('layouts.kategori') --}}
    </div>
</div>
@endsection
