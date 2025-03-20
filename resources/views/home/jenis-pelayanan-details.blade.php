@extends('layouts.main')

@section('container')
<div class="p-4 container-xxxl flex-grow-1 pt-3">
  <div class="row">
    <div class="col-lg-8 col-md-12">
      <div class="card mb-3">
        <div class="card-header bg-label-secondary"> 
          <h3 class="card-title"> 
           <i class='bx bxs-buildings'></i> {{ $data->name }} 
          </h3>
          </div>
          <div class="card-body pt-2" align="justify">
              <p class="card-text fw-bold">
                  <a class="text-white badge bg-info"  href="/jenis-pelayanan/"> Jenis Pelayanan </a>
            </p>        
              <div style="max-height: 400px; overflow:hidden;" class="shadow mb-3 rounded">
                            <img src="{{ asset('storage/'.$data->image) }}" width="100%" class= p-0">
                        </div>
                         <p class="card-text pt-3">{!! $data->description !!}</p>
                        
                        @if($subdata->count())
                          <div class="divider text-start pt-2">
                            <div class="divider-text">
                                <h5 class="text-muted fw-bold"> <i class='bx bxs-bookmark bx-tada' ></i> Fasilitas Terkait : </h5>
                            </div>
                          </div>
                          <div class="row">
                                @foreach ($subdata as $row)
                                <div class="col-md-6 col-6">
                                <div class="card card-body mb-2">
                                    
                                     <h6><i class='bx bxs-message-square-detail'></i> {{ $row->name }} </h6>
                                            </div>
                              </div>    
                                    @endforeach
                          </div>
                          @endif

                          @if (!empty($data->video))
                          <br>
                          <div class="divider text-start pt-2">
                            <div class="divider-text">
                                <h5 class="text-muted fw-bold"> <i class='bx bxs-bookmark bx-tada' ></i> Alur Pelayanan : </h5>
                            </div>
                          </div>
                          {!! $data->video !!}
                          @endif
                    </div>
                  </div>
    </div>
<div class="col-lg-4">
  <div class="divider text-center">
    <div class="divider-text">
        <h5 class="text-muted fw-bold"> <i class='bx bxs-buildings bx-tada' ></i> Jenis Pelayanan : </h5>
    </div>
  </div>
    <div class="card p-0">
        <ul class="list-group">
          @foreach ($layanan as $jenis)
          <li class="list-group-item d-flex align-items-center">
                            <i class="bx bx-buildings me-2"></i><a href="/jenis-pelayanan/{{ $jenis->slug }}">
              {{ $jenis->name }} </a>
                            </li>
          @endforeach
          <li class="text-white list-group-item d-flex justify-content-between align-items-center bg-secondary"><a href="/jenis-pelayanan/" class="text-white"> <i class='bx bx-grid-small'></i> Lihat Semua Pelayanan </a> </li>
        </ul>
    </div>
    @include('layouts.menu-kanan')
</div>
    </div>
    </div>
</section>
@endsection
