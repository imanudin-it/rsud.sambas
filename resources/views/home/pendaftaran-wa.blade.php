@extends('layouts.main')

@section('container')
<div class="p-4 container-xxxl flex-grow-1 pt-3 no-wrap">
  <div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card mb-3">
          <div class="card-header bg-label-primary"> 
            <div class="card-title text-center fw-bold"> 
            <h4> {{ $title }} </h4>
            </div>
            </div>
        
        <div class="gap-2 mx-auto"><br>
            <a href="https://api.whatsapp.com/send?phone=6282154827357&text=Saya%20ingin%20mendaftar%20online"> 
                <button class="btn btn-warning btn-lg fw-bold" type="button"> KLIK DISINI UNTUK MENDAFTAR</button>
            </a>
            </div>
        <img alt="image" src="{{ asset('/storage/daftar-wa/daftar-wa-01.jpg') }}" width="100%">
        <br>
        <img alt="image" src="{{ asset('/storage/daftar-wa/daftar-wa-02.jpg') }}" width="100%">
        <br>
        <img alt="image" src="{{ asset('/storage/daftar-wa/daftar-wa-03.jpg') }}" width="100%">
        <br>
        <img alt="image" src="{{ asset('/storage/daftar-wa/daftar-wa-04.jpg') }}" width="100%">
        <br>
        <div class="d-grid gap-2 mx-auto"><br><br>
               <a href="https://api.whatsapp.com/send?phone=6282154827357&text=Saya%20ingin%20mendaftar%20online"> 
                    <button class="btn btn-warning btn-lg fw-bold" type="button"> KLIK DISINI UNTUK MENDAFTAR</button>
                </a>
            </button>
            <br><br>
            </div>
      </div>
        </div>
        <div class="col-lg-4 col-md-4">
            @include('layouts.menu-kanan')
        </div>
            {{-- @include('layouts.kategori') --}}
    </div>
</div>
@endsection
