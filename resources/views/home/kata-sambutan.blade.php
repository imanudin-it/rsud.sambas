@extends('layouts.main')

@section('container')
<section class="section">
    <div class="m-0 row">
        <div class="col-lg-8 p-0 mb-1">
           <div class="section-header mb-1">
           
      <h1> {{ $title }} </h1>
      
    </div>

    <div class="mb-0 section-body p-1">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-info mb-1">
                    <div class="card-body p-2">
                        <img src="{{ asset('storage/'.$data->image) }}" style="width:100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item"><i class="fa fa-user p-2"></i>  {{ $data->nama }}</li>
                    <li class="list-group-item"><i class="fa fa-gear p-2"></i> {{ $data->jabatan }} </li>
                    <li class="list-group-item"><i class="fa fa-hospital p-2"></i> RSUD Sambas </li>
                   
                  </ul> 
            </div>
        </div>
       <article class="article article-style-c">
                        <div class="article-details text-justify">
                            <p>{!! $data->isi !!}</p>
                        </div>
                        {{-- <div class="card card-info">
                            <div class="card-header">
                              <h4><i class="fa fa-bookmark p-1"></i> Jenis Pelayanan :</h4>
                              <div class="card-header-action">
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i> Lihat</a>
                              </div>
                            </div>
                            <div class="collapse" id="mycard-collapse" style="">
                              <div class="card-body">
                                
                                    <ul class="list-unstyled list-unstyled-border"> 
                                        @foreach ($layanan as $row)
                                        
                                        <li class="media">
                                            <img class="mr-3 rounded" src="{{ asset('storage/'.$row->image) }}" alt="image" style="width:80px; height:80px;">
                                            <div class="media-body">
                                                <div class="float-right text-primary"></div>
                                                        <div class="media-title"><a href="/jenis-pelayanan/{{ $row->slug }}">{{ $row->name }}</a></div>
                                                        <span class="text-small text-muted"> {!! Str::limit($row->description,'200',' ...') !!}</span>
                                            </div>
                                        </li>
                            
                                    @endforeach
                            
                                    </ul>
                              </div>
                            </div>
                          </div> --}}
                    </article>
                    
                </div>
        </div>
<div class="col-lg-4 p-1">
    <div class="shadow section-header mb-1">
        <h1> <i class="fa-regular fa-newspaper"></i>&nbsp; Post Terbaru :</h1>
        </div>
    <div class="section-body p-3 bg-white">
        <ul class="list-unstyled list-unstyled-border">
          @foreach ($posts as $post)
          <li class="media">
            <img class="mr-3 rounded" src="{{ asset('storage/'.$post->foto) }}" alt="image" width="55" width="55" style="width:55px; height:60px;">
            <div class="media-body">
                {{-- <div class="float-right text-primary"></div> --}}
                        <div class="media-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></div>
                        <span class="text-small text-muted"> {!! Str::limit($post->body,'50','..') !!}</span>
            </div>
        </li>
          @endforeach
        </ul>
    </div>
    <div class="card-footer p-0 bg-light">
          <a href="/posts/" class="btn btn-block btn-light btn-sm p-2"> Lihat Semua Artikel </a>
        </div>
    </div>
</div>
    </div>
    </div>
</section>
@endsection
