@extends('layouts.main')

@section('container')
<div class="container-xxl flex-grow-1 pt-3">
  <div class="row">
    <div class="col-lg-8 col-md-12">
      <div class="card mb-3">
        <div class="card-header bg-label-secondary"> 
          <div class="card-title"> 
          <h2> {{ $title }} RSUD Sambas</h2>
          </div>
          </div>
          <div class="card-body row pt-4" align="justify">
            @foreach ($dokters as $dokter)
                
            <div class="col-md-6">
                <div class="card h-100 mb-3">
                  <div class="row g-0">
                    <div class="col-md-4">
                      @if(!empty($dokter->foto))
                      <img class="card-img card-img-left" src="{{ asset('storage/dokter/'.$dokter->foto) }}" alt="Card image">
                      @else
                      <img class="card-img card-img-left" src="{{ asset('storage/dokter/profile.webp') }}" alt="Card image">
                      @endif
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">{{ $dokter->NAMADOKTER }}</h5>
                        <p class="card-text">{{ $dokter->NAMAPROFESI }}
                        </p>
                        <hr>
                        {!! nl2br(e($dokter->pesan)) !!}

                        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            @endforeach
          </div>
        </div>
    </div>
<div class="col-lg-4 col-md-12">
  @include('layouts.menu-kanan')
</div>
  </div>
@endsection
