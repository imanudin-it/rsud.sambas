@extends('dashboard.layouts.main')

@section('container')
<section class="section">
  
<div class="section-header">
    <div class="section-header-back">
      <a href="/dashboard/posts" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>{{ $title }}</h1>
</div>
<div class="bg-whitesmoke p-2 text-right">
    <a href="/dashboard/posts/{{ $post->slug }}/edit/" class="btn btn-warning"><i class="fa fa-edit"></i> | Edit </a>
    <form action="/dashboard/posts/{{ $post->slug }}" class=" d-inline"method="POST">
        @method('delete')
        @csrf
       
          <button class="btn btn-danger" title="Hapus" onclick="return confirm('Are you sure to delete this post ?')"><i class="fas fa-times"></i>  Hapus</button>
        </form>
</div>
<article class="shadow article article-style-b">
    <div style="max-height: 400px; overflow:hidden;">
        <img src="{{ asset('storage/'.$post->foto) }}" width="100%" class="p-0">
    </div>
    <div class="bg-whitesmoke p-2">
                    <i class="fa fa-clock"></i> &nbsp; {{ Carbon\Carbon::parse($post->published_at)->diffForHumans() }} &nbsp; &nbsp;
                    <i class="fa fa-folder"></i> &nbsp; <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a> &nbsp;&nbsp;
                    <i class="fa fa-user"></i> &nbsp; {{ $post->author->name }} 
                </div>
                <div class="article-details" style="font-size:18px; text-align: justify;">
                    <p>{!! $post->body !!}</p>
                </div>
               
            </article>
</section>
@endsection