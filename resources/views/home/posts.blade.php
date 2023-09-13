@extends('layouts.main')

@section('container')
<section class="section">
    <div class="m-0 row">
        <div class="col-md-8 col-lg-8 p-1">
        <div class="section-header mb-2">
            <h1> <i class="fa-regular fa-newspaper"></i>&nbsp; {{ $title }} :</h1>
            
        </div>

    <div class="mb-3 section-body ">
          @if($posts->count()) 
                <article class="article article-style-b mb-2">
                    <div class="article-header">
                        @if($posts[0]->foto)
                        <div class="article-image" data-background="{{ asset('/storage/'.$posts[0]->foto) }}">
                        </div>
                        @else
                        <div class="article-image" data-background="{{ asset('/assets/img/news/img13.jpg') }}">
                        </div>
                       @endif
                    </div>
                    <div class="article-details">
                        <h4><a href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h4>
                        <div class="bg-whitesmoke p-2">
                            <small> <i class="fa fa-folder"></i> &nbsp; <a href="/categories/{{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }} </a> &nbsp;&nbsp;<i class="fa fa-user"></i> &nbsp; {{ $posts[0]->author->name }} </small>
                                </div>
                                <hr class="text-muted m-2">
                                <p class="text-justify">{!! Str::limit($posts[0]->body, '200','...') !!}</p>
                        <div class="article-cta">
                        <i class="fa fa-clock p-2"></i>{{ Carbon\Carbon::parse($posts[0]->published_at)->diffForHumans()  }}
                        </div>
                    </div>
                    </article>
        @else
        <div class="alert alert-danger">
            <div class="alert-title">Tidak Ditemukan !!!</div>
            Artikel tidak ditemukan.
          </div>
          @endif
            @foreach ($posts->skip(1) as $post)
                
                    <div class="card shadow mb-1">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 mb-2">
                                    @if($post->foto)
                                    <img src="{{ asset('storage/'.$post->foto) }}" width="100%" height="150" style="float:left; padding:0px; padding-right: 5px;">
                                     @else
                                     <img src="{{ asset('assets/img/news/img13.jpg') }}" width="100%" height="150" style="float:left; padding:0px; padding-right: 5px;">
                                    @endif
                                </div>
                                <div class="col-md-8 col-lg-8">
                                    <h4> <a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a></h4>
                                    <div class="bg-whitesmoke p-2" style="font-size: 11px;">
                                        <i class="fa fa-calendar"></i> &nbsp; {{ $post->published_at }} &nbsp; &nbsp;
                                        <i class="fa fa-folder"></i> &nbsp; <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }} </a> &nbsp;&nbsp;<i class="fa fa-user"></i> &nbsp;  {{ $post->author->name }} 
                                            </div>
                                            <hr class="text-muted m-2">
                                             <p class="mb-3 text-justify">{{ str_replace('<div>','',Str::limit($post->body, '150','...')) }}</p>  
                                             <div class="article-cta text-right ">
                                                <a href="/posts/{{ $post->slug }}"> Read More <i class="fas fa-chevron-right"></i> </a>
                
                                                </div>
                                 </div>
                                 
                            </div>
                        </div>
                    </div>
            @endforeach
            <div class="pagination justify-content-end bg-whitesmoke p-2" align="right" style="text-align: center;">
                {{ $posts->links() }} 
             </div>
        
            </div>
        </div>
        <div class="col-md-8 col-lg-4">
            <div class="shadow section-header mb-1">
                <h1> <i class="fa-solid fa-lines-leaning"></i>&nbsp; Kategori :</h1>
            </div>
            <div class="mb-0 section-body ">
                <ul class="list-group">
                    @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
                      <span class="badge badge-primary badge-pill">{{ $category->posts->count() }}</span>
                    </li>
                    @endforeach
                    <li class="text-white list-group-item d-flex justify-content-between align-items-center bg-primary"><a href="/posts/" class="text-white"> Lihat Semua Artikel </a>
                  </ul>
        </div>
</section>    
 
@endsection
