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
        
        <ul class="list-group">
          
            @foreach ($data as $list)
            @if(!empty($list->ruang))
                <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex justify-content-between w-100">
                      <h6>{{ $list->ruang }}</h6>
                      <small class="text-muted">Tersedia : <span class="badge bg-primary"> {{ $list->kosong }}</span></small>
                    </div>
                    <div class="d-flex justify-content-between w-100 text-muted">
                      <small> Kelas : {{ $list->tt }} </small>
                      <small class="text-muted"><i class='bx bxs-time'></i>
                        <i>
                            {{ \Carbon\Carbon::parse($list->tglupdate)->format('Y-m-d H:i:s') }}
                          </i></small>
                    
                    </div>
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
