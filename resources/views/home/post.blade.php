@extends('layouts.main')

@section('container')
<section class="section">
    <div class="m-0 row">
        <div class="col-md-8 col-lg-8 p-1">
        <div class="section-header mb-1">
           
      <h1> {{ $post->title }} </h1>
      
    </div>

    <div class="section-body mb-0">
        <div class="bg-whitesmoke p-2 text-right">
            <i class="fa fa-clock p-1"></i> {{ Carbon\Carbon::parse($post->published_at)->format('D, d M Y') }} 
            <i class="fa fa-folder p-1"></i> <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a> 
             
      </div>
       <article class="shadow article article-style-b">
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
 <div class="col-lg-4 p-1">
    <div class="shadow section-header mb-1">
        <h1> <i class="fa-regular fa-newspaper"></i>&nbsp; {{ $post->category->name }} Lainnya :</h1>
        </div>
    <div class="section-body p-3 bg-white">
        <ul class="list-unstyled list-unstyled-border">
          @foreach ($relatedArticles as $terkait)
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
    </div>
    </div>
</section>
@endsection
