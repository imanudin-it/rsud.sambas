@extends('layouts.main')

@section('container')
<div class="container-xxl flex-grow-1 pt-3">
  <div class="row">
    <div class="col-lg-8 col-md-8">
      <div class="divider text-center">
        <div class="divider-text">
            <h5 class="text-muted fw-bold"> <i class='bx bx-info-circle bx-tada' ></i> {{ $title }} : </h5>
        </div>
    </div>
      <div class="card p-3 mb-4">
        <div align="center">
            <span class="btn btn-warning btn-sm mb-3"> Lastupdate : {{ Str::substr($data[0]->lastupdate,0,11) }} </span>
        </div>
        <ul class="list-group">
            @foreach ($data as $list)
                @if($list->namaruang != "OBGYN-COVID")
                <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex justify-content-between w-100">
                      <h6>{{ $list->namaruang }}</h6>
                      <small class="text-muted">Tersedia : <span class="badge bg-primary"> {{ $list->tersedia }}</span></small>
                    </div>
                    <small class="text-muted">Kelas : {{ $list->namakelas }}</small>
                  </a>
                {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                  {{ $list->namaruang }} <br> <small> {{ $list->namakelas }} </small>
                  <span class="badge bg-primary"> {{ $list->tersedia }}</span>
                </li> --}}
                @endif
               @endforeach
        </ul>
      </div>
        </div>
        <div class="col-lg-4 col-md-4">
            @include('layouts.menu-kanan')
        </div>
            {{-- @include('layouts.kategori') --}}
    </div>
</div>
@endsection
