@extends('layouts.main')

@section('container')
<div class="p-2 p-lg-4 container-xxxl flex-grow-1 pt-3">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card mb-3">
        <div class="card-header bg-label-secondary"> 
          <div class="card-title text-center"> 
          <h2> {{ $title }} RSUD Sambas</h2>
          </div>
          </div>
          <br>
          <iframe src="https://web.rsudsambas.co.id/tv" width="100%" height="700"></iframe> <br>
          <div class="divider text-center pt-3">
            <div class="divider-text">
              <h5 class="text-muted fw-bold"> <i class='bx bx-user' ></i> Dokter Kami : </h5>
            </div>
          </div>
          <div class="card-body row pt-4">
            @foreach ($dokters as $dokter)
                
            <div class="col-md-4 mb-3">
                <div class="card h-100">
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
                        <h5 class="card-title text-right">{{ $dokter->NAMADOKTER }}</h5>
                        <small class="card-text text-right">{{ $dokter->NAMAPROFESI }}
                        </small>
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
  </div>
@endsection
