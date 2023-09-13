@extends('layouts.main')

@section('container')
<style>
    .img-container {
  width: 100%; /* Lebar container */
  max-height: 200px; /* Tinggi maksimal */
  overflow: hidden; /* Untuk memotong gambar yang berlebihan */
}

.img-container img {
  width: 100%; /* Gambar mengisi lebar container */
  height: 100%; /* Gambar mengisi tinggi container */
  object-fit: cover; /* Gambar tetap proporsional dan potong sesuai container */
}
</style>
<div class="container-xxl flex-grow-1 pt-3">
    
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="divider text-start">
                <div class="divider-text">
                    <h5 class="text-muted"> <i class='bx bx-news' ></i> {{ $title }} : </h5>
                </div>
            </div>
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
                                                <a href="/posts/{{ $post->slug }}"> Baca Selengkapnya &raquo; <i class="fas fa-chevron-right"></i> </a>
                
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
            <div class="divider text-start">
                <div class="divider-text">
                    <h5 class="text-muted"> <i class='bx bxs-folder-open'></i> Kategori : </h5>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body p-0">
                <ul class="list-group">
                    @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <a href="/categories/{{ $category->slug }}"><i class='bx bxs-folder'></i> {{ $category->name }}</a>
                      <span class="badge bg-label-primary">{{ $category->posts->count() }}</span>
                    </li>
                    @endforeach
                    <li class="text-white list-group-item d-flex justify-content-between align-items-center bg-secondary"><a href="/posts/" class="text-white"> <i class='bx bx-grid-small'></i> Lihat Semua Artikel </a>
                  </ul>
                </div>
        </div>
        </div>
    </div>
 
@endsection
