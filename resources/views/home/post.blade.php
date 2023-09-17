@extends('layouts.main')

@section('container')
<div class="container-xxl flex-grow-1 pt-3">
    <div class="row">
      <div class="col-lg-8 col-md-12">
        <div class="card mb-3">
          <div class="card-header bg-label-secondary"> 
            <div class="card-title"> 
            <h4> {{ $post->title }} </h4>
            </div>
            </div>
            <div class="card-body pt-4" align="justify">
                <p class="card-text">
                    <span class="text-white badge bg-secondary">  {{ Carbon\Carbon::parse($post->published_at)->format('d F Y'); }} </span>
              <a class="text-white badge bg-info"  href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a>
              </p>        
                <div style="max-height: 400px; overflow:hidden;">
                            <img src="{{ asset('storage/'.$post->foto) }}" width="100%" class="p-1">
                        </div>
                        <div class="article-details" style="text-align: justify;">
                            <p>{!! $post->body !!}</p>
                        </div>
                    
                <div class="p-3 bg-whitesmoke text-right">
                    <i class="fa fa-eye"></i> {{ $post->reads }} views &bull; <i class="fa fa-user p-1"></i> Post by : {{ $post->author->name }}
                </div>   
                    </article>
                    
                </div>
        </div>
      </div>
 <div class="col-lg-4">
    <div class="divider text-center">
        <div class="divider-text">
          <h5 class="text-muted fw-bold"> <i class='bx bx-news' ></i> {{ $post->category->name }} Terkait : </h5>
        </div>
      </div>
    @foreach ($relatedArticles as $terkait)
          <div class="card shadow mb-2">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-4 col-md-4 col-lg-4 mb-1"style="max-height: 80px; overflow: hidden;">
                        @if($post->foto)
                        <img  class="img rounded" src="{{ asset('storage/'.$terkait->foto) }}" width="100%">
                         @else
                         <img  class="img rounded" src="{{ asset('assets/img/news/img13.jpg') }}" width="100%">
                        @endif
                    </div>
                    <div class="col-md-8 col-8 col-lg-8">
                      <p class="card-text" style="font-size: 11px;">
                        <span class="text-white badge bg-secondary">  {{ Carbon\Carbon::parse($terkait->published_at)->format('d F Y'); }} </span>
                        <a class="text-white badge bg-info"  href="/categories/{{ $terkait->category->slug }}"> {{ $terkait->category->name }} </a></p>
                        
                        <h6 class="card-title text-muted"> <a href="/posts/{{ $terkait->slug }}"> {{ $terkait->title }}</a></h5>
                        
                     </div>
                     
                </div>
            </div>
        </div>
          @endforeach
          <div align="right" class="pt-2 mb-4"> <a href="/posts" class="btn btn-primary btn-sm"> Lihat Semua &raquo; </a> </div>
        
          @include('layouts.kategori')
        
        </div>
      </div>
</div>
@endsection
