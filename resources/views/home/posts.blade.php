@extends('layouts.main')

@section('container')

<div class="p-2 p-lg-4 container-xxxl flex-grow-1 pt-3">
    
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="divider text-center">
                <div class="divider-text">
                    <h5 class="text-muted fw-bold"> <i class='bx bx-news bx-tada' ></i> {{ $title }} : </h5>
                </div>
            </div> 
            @if(request('search'))
            <div class="alert bg-label-primary pt-2 mb-3 text-muted">
                <i class='bx bx-search-alt'></i> " {{ request('search') }} "
            </div>
            @endif
          @if($posts->count()) 
            @foreach ($posts as $post)
                    <div class="card shadow mb-1">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 mb-2">
                                    <div class="img-container"> @if($post->foto)
                                    <img src="{{ asset('storage/'.$post->foto) }}" width="100%"  style="float:left; padding:0px; padding-right: 5px;">
                                     @else
                                     <img src="{{ asset('assets/img/news/img13.jpg') }}" width="100%" style="float:left; padding:0px; padding-right: 5px;">
                                    @endif
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-8">
                                    <p class="card-text">
                                          <span class="text-white badge bg-secondary">  {{ Carbon\Carbon::parse($post->published_at)->format('d F Y'); }} </span>
                                    <a class="text-white badge bg-info"  href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a>
                                    </p>
                                    <h4> <a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a></h4>
                                    
                                            <hr class="text-muted m-2">
                                             <p class="mb-3 text-justify">{{ str_replace('<div>','',Str::limit($post->body, '150','...')) }}</p>  
                                             <div align="right">
                                                <a class="badge bg-label-secondary p-2" href="/posts/{{ $post->slug }}"> Baca Selengkapnya &raquo; <i class="fas fa-chevron-right"></i> </a>
                
                                                </div>
                                 </div>
                                 
                            </div>
                        </div>
                    </div>
            @endforeach
            
            <div class="pagination justify-content-end bg-whitesmoke p-2" align="right" style="text-align: center;">
                {{ $posts->links() }} 
             </div>
             @else
             <div class="card">
                <div class="card-body"align="center">
                    <img src="{{ asset('storage/404.png') }}" width="50%" ><br>
                    <div class="alert alert-danger">
                        <div class="alert-title">Tidak Ditemukan !!!</div>
                        Artikel tidak ditemukan.
                    </div>
                </div>
             </div>
               @endif
            </div>
            <div class="col-md-8 col-lg-4">
                @include('layouts.kategori')
                @include('layouts.menu-kanan')
                
            </div>
    </div>
 
@endsection
