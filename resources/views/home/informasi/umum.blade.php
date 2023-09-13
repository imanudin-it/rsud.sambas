@extends('layouts.main')

@section('container')
<section class="section">
    <div class="m-0 row">
        <div class="col-lg-8 p-1 mb-1">
           <div class="section-header mb-1">
           
      <h1><i class="fas fa-info fa-lg p-2"></i> {{ $title }} </h1>
      
    </div>

    <div class="mb-0 section-body">
       
       <article class="shadow article article-style-b">
                       
                        <div class="article-details text-justify">
                        
                        @if($data->count())
                            @foreach ($data as $row)
                            <div class="card card-info">
                                <div class="card-header">
                                <h4><i class="fa fa-bookmark p-1"></i> {{ $row->nama }} :</h4>
                                    <div class="card-header-action">
                                     <a data-collapse="#{{ $row->id }}" class="btn btn-icon btn-info" href="#{{ $row->id }}"><i class="fas fa-plus"></i> Lihat</a>
                                    </div>
                                 </div>
                            <div class="collapse" id="{{ $row->id }}" style="">
                              <div class="card-body">
                                <embed src="{{ asset('storage/'.$row->file.'') }}" width="100%" height="500" alt="pdf" />
                              </div>
                            </div>
                          </div>
                          @endforeach
                          @endif
                        </div>
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
                    <img class="mr-3 rounded" src="{{ asset('storage/'.$post->foto) }}" alt="image" width="55"  width="55" style="width:55px; height:60px;">
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
</section>
@endsection
