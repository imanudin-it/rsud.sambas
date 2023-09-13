@extends('layouts.main')

@section('container')
<style>

  .bg-header{
    background-image: url('{{ asset('storage/home-slide/rsud-direktur.png') }}');
    background-size: cover;
    background-repeat: no-repeat;
    #border-top : solid 03px #3c598c;
}
.card.bg-header {
  display: flex;
  align-items: left; /* Mengatur teks ke tengah secara vertikal */
  justify-content: center; /* Mengatur teks ke tengah secara horizontal */
  text-align: left; /* Untuk mengatur teks menjadi tengah secara horizontal dalam kotak */
  }

.card.bg-header h2 {
  margin: 0; /* Menghapus margin bawaan */
}

.pl-2 {
  padding-left: 10px;
}



.fs-85 {
  font-size: 85%;
  color: rgba(44, 107, 173, 0.863);
}
.img-100 {
  width: 100%;
  height: 135px;
                     
}

.img-container {
  width: 100%; /* Lebar container */
  max-height: 300px; /* Tinggi maksimal */
  overflow: hidden; /* Untuk memotong gambar yang berlebihan */
}

.img-container img {
  width: 100%; /* Gambar mengisi lebar container */
  height: 100%; /* Gambar mengisi tinggi container */
  object-fit: cover; /* Gambar tetap proporsional dan potong sesuai container */
}


@media screen and (max-width: 768px) {
  .card.bg-header {
    background-size: auto 100%; /* Menyesuaikan ketinggian latar belakang dengan tinggi konten */
    padding: 20px; /* Menambahkan ruang di sekitar card saat tampilan mobile */
  }
}
  </style>

<div class="container-xxl flex-grow-1 pt-3"> 
  <div class="card shadow bg-header mb-4" style="height: 240px;">
      <h5 class="pl-2 mb-3 text-white"> Selamat Datang ! </h5>
      <h1 class="fw-bold mb-2 pl-2 text-white" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"> <u> RSUD SAMBAS </u></h1>
      <small> <p class="pl-2 text-white"> <i class='bx bxs-location-plus'></i> Jl. Pendidikan No. 300 - Sambas, Kalimantan Barat </p>
      </small>
  </div>

  
  <div class="row">
    <div class="col-lg-8 col-md-8">
      @include('layouts.menu')
    </div>
    <div class="col-lg-4 col-md-4">
      <div class="divider text-start">
        <div class="divider-text">
          <h5 class="text-muted"> <i class='bx bx-user-voice bx-tada' ></i> Kata Sambutan : </h5>
        </div>
      </div>
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-3 col-md-3 col-lg-3">
            <img class=" rounded p-3" src="{{ asset('storage/'.$katasambutan->image) }}" alt="Kata Sambutan" width="100" />
          </div>
          <div class="col-9 col-md-9 col-lg-9">
              <h5 class="card-title p-2 pt-3 mb-0">{{ $katasambutan->nama }} </h5>
              <p class="text-muted p-2">{{ $katasambutan->jabatan }}
          </div>
        </div> <div class="card-text p-3" align="justify">
                {!! str_replace('<div>','',Str::limit($katasambutan->isi, '200', '   ...')) !!}
                  <div align="right" class="pt-2"> <a href="/kata-sambutan" class="btn btn-secondary btn-sm"> Lihat Selengkapnya &raquo; </a> </div>
                </div>
              
             </div>
          </div>
        </div>
      </div>
{{-- end row menu sambutan --}}

{{-- Postingan --}}
<div class="container-xxl flex-grow-1"> 
  <div class="divider text-start">
    <div class="divider-text">
      <h5 class="text-muted"> <i class='bx bx-news' ></i> Postingan Terbaru : </h5>
    </div>
  </div>
<div class="row">
  <div class="col-lg-6 col-md-6">
    <div class="card mb-3">
      <div class="card-body">
       
        <span class="badge bg-label-secondary"><i class='bx bxs-time-five'></i> {{ Carbon\Carbon::parse($latestPost->published_at)->format('l, d F Y'); }}</span> 
        
        <a class="mb-2 text-white badge badge-lg bg-info"  href="/categories/{{ $latestPost->category->slug }}"><i class='bx bx-folder' ></i> {{ $latestPost->category->name }} </a>
  
        <div class="img-container mb-4 shadow ">
          <img width="100%" class="img rounded" src="@if($latestPost->foto != '') {{ asset('storage/'.$latestPost->foto) }}" 
              @else {{ asset('assets/img/news/img13.jpg') }}
               @endif> 
              </div>
        <h5 class="card-title text-muted" align="justify"><a href="/posts/{{ $latestPost->slug }}">{{ $latestPost->title }}</a></h5>
        
        
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-md-6 mb-3">
    @foreach ($nextPost as $post)
                
    <div class="card shadow mb-2">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-4 col-md-2 col-lg-2 mb-1">
                    @if($post->foto)
                    <img  class="img rounded" src="{{ asset('storage/'.$post->foto) }}" width="100%" height="80" style="float:left; padding:0px; padding-right: 5px;">
                     @else
                     <img  class="img rounded" src="{{ asset('assets/img/news/img13.jpg') }}" width="100%"  height="80" style="float:left; padding:0px; padding-right: 5px;">
                    @endif
                </div>
                <div class="col-md-10 col-8 col-lg-10">
                  <p class="card-text" style="font-size: 11px;">
                    <span class="text-white badge bg-secondary">  {{ Carbon\Carbon::parse($post->published_at)->format('d F Y'); }} </span>
                    <a class="text-white badge bg-info"  href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a></p>
                    
                    <h6 class="card-title text-muted"> <a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a></h5>
                    
                 </div>
                 
            </div>
        </div>
    </div>
@endforeach 
<div align="right" class="pt-2"> <a href="/posts" class="btn btn-primary btn-sm"> Lihat Semua &raquo; </a> </div>
  </div>
</div>
{{-- End Post Area --}}
<div class="bg-label-primary p-0 mb-2">
  <img class="img rounded" src="{{ asset('storage/footer.jpg') }}" width="100%">
</div>

</div>
@endsection