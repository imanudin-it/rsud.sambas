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
          <div class="card-body pt-4" align="justify">
        @if(request('kat')=='sejarah')
                        <div style="max-height: 400px; overflow:hidden;" class="shadow">
                            <img src="{{ asset('storage/'.$data->image) }}" width="100%" class="p-0">
                        </div>
                        <div class="article-details text-justify">
                            <p>{!! $data->sejarah !!}</p>
                        </div>
                        @else
                        <div style="max-height: 400px; overflow:hidden;" class=" mb-3">
                          <img src="{{ asset('storage/post-images/visi-misi.png') }}" width="100%" class="p-0">
                      </div>
                      <div class="article-details text-justify mb-3 ">
                        <h2 class="section-title"> Visi</h2>
                          {!! $data->visi !!}
                          <h2 class="section-title"> Misi</h2>
                            {!! $data->misi !!}
                            <h2 class="section-title"> Moto</h2>
                              {!! $data->moto !!}
                      </div>
                    @endif
                        {{-- @if($subdata->count())
                        <div class="card card-info">
                            <div class="card-header">
                              <h4><i class="fa fa-bookmark p-1"></i> Fasilitas Terkait :</h4>
                              <div class="card-header-action">
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i> Lihat</a>
                              </div>
                            </div>
                            <div class="collapse" id="mycard-collapse" style="">
                              <div class="card-body">
                                
                                    <ul class="list-unstyled list-unstyled-border"> 
                                        @foreach ($subdata as $row)
                                        
                                        <li class="media">
                                            <img class="mr-3 rounded" src="{{ asset('storage/'.$row->image) }}" alt="image" width="55">
                                            <div class="media-body">
                                               
                                                        <div class="media-title"><a href="/jenis-pelayanan/{{ $row->slug }}">{{ $row->name }}</a></div>
                                                        <span class="text-small text-muted"> {!! $row->descriptions !!}</span>
                                            </div>
                                        </li>
                            
                                    @endforeach
                            
                                    </ul>
                              </div>
                            </div>
                          </div>
                          @endif --}}
                   </div>
        </div>
    </div>
<div class="col-lg-4 col-md-12">
  <div class="divider text-start">
    <div class="divider-text">
      <h5 class="text-muted"> <i class='bx bx-menu-alt-left bx-tada' ></i> Menu : </h5>
    </div>
  </div>
  <div class="row">
    <div class="col-6 col-md-6 col-lg-6">
      <div class="shadow card mb-3 link">
        <div class="card-body">
          <a href="#" data-bs-toggle="offcanvas" data-bs-target="#profil" aria-controls="offcanvasStart">
          <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-primary p-3"><i class='bx bxs-user-detail'></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Profil</span>
             </a>
        </div> 
      </div>
      </a>
    </div>
    {{-- Canvas Profile --}}
                <div
                    class="offcanvas offcanvas-start"
                    tabindex="-1"
                    id="profil"
                    aria-labelledby="offcanvasStartLabel"
                  >
                    <div class="offcanvas-header">
                      <h5 id="offcanvasStartLabel" class="offcanvas-title">Profil</h5>
                      <button
                        type="button"
                        class="btn-close text-reset"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                      <p class="text-center text-white">
                        <img src="{{ asset('storage/rsud.png') }}" width="100%"  class="rounded">
                      </p>
                      <h6> Rumah Sakit Umum Daerah Sambas </h6>
                      <hr class="text-muted">
                      <a href="/profil/sejarah" class="btn btn-primary mb-2  w-100" align="left"><i class='bx bx-history bx-tada' ></i> Sejarah </a>
                      <a href="/profil/visi-misi" class="text-left btn btn-info mb-2  w-100"><i class='bx bx-message-dots bx-tada' ></i> Visi & Misi </a>
                      
                    </div>
                  </div>


    <div class="col-6 col-md-6 col-lg-6">
      <div class="shadow card mb-3 link">
        <div class="card-body">
          <a href="..">
             <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-primary p-3"><i class='bx bx-info-circle'></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Info Pelayanan</span>
          </a>
        </div> 
      </div>
      </a>
    </div>          
    <div class="col-6 col-md-6 col-lg-6">
      <div class="shadow card mb-3 link">
        <div class="card-body">
          <a href="..">
             <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-primary text-white p-3"><i class='bx bxs-timer'></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Jadwal Dokter</span>
          </a>
        </div> 
      </div>
      </a>
    </div>
    
    
    <div class="col-6 col-md-6 col-lg-6">
      <div class="shadow card mb-3 link">
        <div class="card-body">
          <a href="..">
             <div class="card-title d-flex align-items-start justify-content-between">
            <span class="avatar-initial rounded bg-label-warning p-3"><i class='bx bxs-contact' ></i></span>
             </div>
             <span class="fs-85 fw-semibold d-block">Hubungi Kami</span>
          </a>
        </div> 
      </div>
      </a>
    </div>
    <div class="shadow section-header mb-2">
        <h1> <i class="fa-regular fa-newspaper"></i>&nbsp; Post Terbaru :</h1>
        </div>
    <div class="section-body p-3 bg-white">
        <ul class="list-unstyled list-unstyled-border">
          @foreach ($posts as $terkait)
          <li class="media">
            <img class="mr-3 rounded" src="{{ asset('storage/'.$terkait->foto) }}" alt="image" width="55" style="width:55px; height:60px;">
            <div class="media-body">
                {{-- <div class="float-right text-primary"></div> --}}
                        <div class="media-title"><a href="/posts/{{ $terkait->slug }}">{{ $terkait->title }}</a></div>
                        <span class="text-small text-muted"> {!! Str::limit($terkait->body,'50','..') !!}</span>
            </div>
        </li>
          @endforeach
        </ul>
    </div>
    <div class="card-footer p-0 bg-whitesmoke">
          <a href="/posts/" class="btn btn-block btn-light btn-sm p-2"> Lihat Semua Artikel </a>
    </div>
    </div>
    </div>
</section>
@endsection
