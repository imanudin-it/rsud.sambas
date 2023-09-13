@extends('layouts.main')

@section('container')
<section class="section">
    <div class="m-0 row">
        <div class="col-lg-8 p-0 mb-1">
           <div class="section-header mb-1">
           
      <h1> {{ $data->name }} </h1>
      
    </div>

    <div class="mb-0 section-body p-1">
       
       <article class="shadow article article-style-b">
                        <div style="max-height: 400px; overflow:hidden;">
                            <img src="{{ asset('storage/'.$data->image) }}" width="100%" class="p-0">
                        </div>
                        <div class="article-details text-justify">
                            <p>{!! $data->description !!}</p>
                        </div>
                        @if($subdata->count())
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
                                                {{-- <div class="float-right text-primary"></div> --}}
                                                        <div class="media-title"><a href="/jenis-pelayanan/{{ $row->slug }}">{{ $row->name }}</a></div>
                                                        <span class="text-small text-muted"> {!! $row->descriptions !!}</span>
                                            </div>
                                        </li>
                            
                                    @endforeach
                            
                                    </ul>
                              </div>
                            </div>
                          </div>
                          @endif
                    </article>
                    
                </div>
        </div>
<div class="col-lg-4 p-1">
    <div class="card card-warning">
        <div class="card-header shadow mb-1">
        <h4> <i class="fa fa-list-ol"></i>&nbsp; Jenis Layanan :</h4>
        </div>
    <div class="card-body m-0 p-0">
        <div class="list-group">
          @foreach ($layanan as $jenis)
          <a href="/jenis-pelayanan/{{ $jenis->slug }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              {{ $jenis->name }}
            </div>
          </a> 
          @endforeach
          <a href="/jenis-pelayanan/" class="btn btn-block btn-warning"> Lihat Semua </a>
        </div>
    </div>
</div>
    </div>
    </div>
</section>
@endsection
