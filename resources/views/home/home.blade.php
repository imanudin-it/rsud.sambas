@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="{{ asset('assets/owlcarousel/owlcarousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/owlcarousel/owlcarousel/assets/owl.theme.default.min.css') }}">
<style>

  .bg-header{
    background-image: url('{{ asset('storage/header-rsud.webp') }}');
    background-size: cover;
    background-repeat: no-repeat;
    border-top : solid 3px #3c598c;
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

.img-100 {
  width: 100%;
  height: 155px;
                     
}

.img-container {
  width: 100%; /* Lebar container */
  max-height: 330px; /* Tinggi maksimal */
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
  {{-- <div class="card shadow bg-header mb-4" style="height: 240px;" loading="lazy">
      <h5 class="pl-2 pt-4 mb-3 text-white"> Selamat Datang ! </h5>
      <h1 class="fw-bold mb-2 pl-2 text-white" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"> <u> RSUD SAMBAS </u></h1>
      <small> 
        <div class="pl-2 text-muted"> 
          <i class='bx bxs-location-plus'></i> Jl. Pendidikan No. 300 - Sambas, Kalimantan Barat <br>
          <i class='bx bxs-envelope'></i> admin@rsudsambas.co.id 
        </div>
      </small>
  </div> --}}
  <div class="loop-header owl-carousel owl-theme owl-loaded mb-2" >
    <div class="owl-stage-outer">
        <div class="owl-stage">
          @foreach($slide_header as $image)
        
          <div class="owl-item">
            <div class="card">
              <div class="card-body mb-0 p-0" style="max-height: 250px; overflow: hidden;">
               <img alt="image" src="{{ asset('/storage/slide-header/'.$image) }}" width="100%" height="250" style="border-radius:10px;" class=" bt-primary">
            </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
  </div>
  
  <div class="row">
    <div class="col-lg-8">
      @include('layouts.menu')
    </div>
    <div class="col-lg-4">
      <div class="divider text-center">
        <div class="divider-text">
          <h5 class="text-muted fw-bold"> <i class='bx bx-user-voice bx-tada' ></i> Kata Sambutan : </h5>
        </div>
      </div>
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-3 col-md-2 col-lg-3">
            <img class=" rounded p-3" src="{{ asset('storage/'.$katasambutan->image) }}" alt="Kata Sambutan" width="100" />
          </div>
          <div class="col-9 col-md-9 col-lg-9">
              <h5 class="card-title p-2 pt-3 mb-0"><i class='bx bxs-user-badge'></i> {{ $katasambutan->nama }} </h5>
              <p class="text-muted pt-1 p-2"> <i class='bx bxs-bolt-circle'></i> {{ $katasambutan->jabatan }}
          </div>
        </div> <div class="card-text p-3" align="justify">
                {!! str_replace('<div>','',Str::limit($katasambutan->isi, '250', '   ...')) !!}
                  <div align="right" class="pt-2"> <a href="/kata-sambutan" class="btn btn-secondary btn-sm"><i class='bx bxs-comment-detail bx-tada' ></i> Lihat Selengkapnya &raquo; </a> </div>
                </div>
              
             </div>
          </div>
        </div>
      </div>
{{-- end row menu sambutan --}}

<div class="container-xxl flex-grow-1"> 
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
    <div class="divider text-center">
      <div class="divider-text">
        <h5 class="text-muted fw-bold"> <i class='bx bx-user' ></i> Dokter Kami : </h5>
      </div>
    </div>
      <div class="mb-4 loop-dokter owl-carousel owl-theme owl-loaded">
        <div class="owl-stage-outer">
            <div class="owl-stage">
            @foreach ($dokters as $dokter)
           
              <div class="owl-item h-100 ">
                
                <div class="col-md">
                  <div class="card">
                    <div class="row g-0">
                      <div class="col-md-4">
                        @if(!empty($dokter->foto))
                        <img class="card-img card-img-left" src="{{ asset('storage/dokter/'.$dokter->foto) }}" alt="Card image">
                        @else
                        <img class="card-img card-img-left" src="{{ asset('storage/dokter/profile.webp') }}" alt="Card image">
                        @endif
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{ $dokter->NAMADOKTER }}</h5>
                          <p class="card-text">{{ $dokter->NAMAPROFESI }}
                          </p>
                          {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- <div class="card h-200 mb-3">
                  <img class="card-img-top" src="{{ asset('storage/dokter/'.$dokter->foto) }}" width="80" alt="Card image cap" loading="lazy">
                  <div class="card-body">
                    <h6 class="card-title">{{ $dokter->NAMADOKTER }}</h6>
                    <p class="card-text">
                      <small class="text-muted">{{ $dokter->NAMAPROFESI }}</small>
                    </p>
                  </div>
                </div> --}}
              </div>
            @endforeach
            </div>
          </div>
          {{-- <div align="right"> <a href="/dokter" class="btn btn-primary btn-sm"><i class='bx bx-grid-small bx-tada' ></i> Lihat Semua Dokter &raquo; </a> </div> --}}
      </div>
      <div class="row">
        <div class="d-grid gap-2 col-lg-6 mx-auto">
          <a class="btn bg-label-primary btn-lg" href="/jadwal-dokter"><i class='bx bx-user-circle bx-tada'></i> Lihat Jadwal Dokter</a>
        </div>
      </div>
  </div>
  {{-- <div class="col-lg-6 col-md-6 col-12 mb-4">
    <div class="divider text-center">
      <div class="divider-text">
        <h5 class="text-muted fw-bold"> <i class='bx bxs-videos' ></i> Video Layanan : </h5>
      </div>
    </div>
    <iframe class="card card-body p-1" style="border-radius:10px;" width="100%" height="300" src="https://www.youtube.com/embed/81TTX3czdnQ" title="ALUR PELAYANAN RSUD SAMBAS - PKRS" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div> --}}
  </div>
</div>
{{-- Postingan --}}
<div class="container-xxl flex-grow-1"> 
  <div class="divider text-center">
    <div class="divider-text">
      <h5 class="text-muted fw-bold"> <i class='bx bx-news' ></i> Postingan Terbaru : </h5>
    </div>
  </div>
<div class="row">
  <div class="col-lg-6">
    <div class="card mb-2">
      <div class="card-body">
        <p class="card-text" style="font-size: 11px;">
        <span class="badge bg-label-secondary"><i class='bx bxs-time-five'></i> {{ Carbon\Carbon::parse($latestPost->published_at)->format('l, d F Y'); }}</span> 
        
        <a class="mb-2 text-white badge badge-lg bg-info"  href="/categories/{{ $latestPost->category->slug }}"><i class='bx bx-folder' ></i> {{ $latestPost->category->name }} </a>
        </p>
        <div class="img-container mb-4 shadow ">
          <img width="100%" class="img rounded" src="@if($latestPost->foto != '') {{ asset('storage/'.$latestPost->foto) }}" 
              @else {{ asset('assets/img/news/img13.jpg') }}
               @endif
               loading="lazy"> 
              </div>
        <h5 class="card-title text-muted"><a href="/posts/{{ $latestPost->slug }}">{{ $latestPost->title }}</a></h5>
        
        
      </div>
    </div>
  </div>

  <div class="col-lg-6 mb-3">
    @foreach ($nextPost as $post)
    <div class="card shadow mb-2">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-4 col-md-4 col-lg-4 mb-1" style="max-height: 80px; overflow: hidden;">
                    @if($post->foto)
                    <img  class="img rounded" src="{{ asset('storage/'.$post->foto) }}" width="100%">
                     @else
                     <img  class="img rounded" src="{{ asset('assets/img/news/img13.jpg') }}" width="100%"  height="80" style="float:left; padding:0px; padding-right: 5px;">
                    @endif
                </div>
                <div class="col-md-8 col-8 col-lg-8">
                  <p class="card-text" style="font-size: 11px;">
                    <span class="text-white badge bg-secondary">  {{ Carbon\Carbon::parse($post->published_at)->format('d F Y'); }} </span>
                    <a class="text-white badge bg-info"  href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a></p>
                    
                    <h6 class="card-title text-muted"> <a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a></h5>
                    
                 </div>
                 
            </div>
        </div>
    </div>
@endforeach 

{{-- 
<div align="right" class="pt-2"> <a href="/posts" class="btn btn-primary btn-sm">Lihat Semua &raquo; </a> </div>
  </div> --}}
 
</div>

{{-- End Post Area --}}
</div>
<div class="row">
  <div class="d-grid gap-2 col-lg-6 mx-auto">
    <a class="btn bg-label-primary btn-lg" href="/posts"><i class='bx bx-grid-small bx-tada' ></i> Lihat Semua Postingan</a>
  </div>
</div>
<div class="row">
{{-- Fasilitas dan Layanan --}}

  <div class="col-lg-8 col-md-8 col-12">
    <div class="divider text-center">
      <div class="divider-text">
        <h5 class="text-muted fw-bold"> <i class='bx bx-buildings bx-tada'></i> Fasilitas dan Layanan : </h5>
      </div>
    </div>
    <div class="p-0 m-0 mb-3 loop owl-carousel owl-theme owl-loaded">
      <div class="card-body p-0 ">
      <div class="owl-stage-outer">
          <div class="owl-stage">
          @foreach ($layanan as $pelayanan)
          
            <div class="owl-item bt-primary ">
              <div class="card">
                  <div class="text-center text-muted p-3 fw-bold card-title bg-label-success mb-1"><a href="/jenis-pelayanan/{{ $pelayanan->slug }}">{{ $pelayanan->name }}</a></div>
                <div class="card-body p-0" style="max-height: 200px; overflow: hidden;">
                <img alt="image" src="{{ asset('/storage/'.$pelayanan->image) }}" width="100%" height="190">
              </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- end Fasilitas --}}
<div class="col-lg-4 col-md-4 col-12">
  <div class="divider text-center">
    <div class="divider-text">
      <h5 class="text-muted fw-bold"> <i class='bx bx-badge-check' ></i> Survey Kepuasan Pasien : </h5>
    </div>
  </div>
  <a href="//bit.ly/SurveyKepuasanPasienRSUDSambas" target="_blank()">
    <img alt="image" src="{{ asset('/storage/survey-kepuasan.jpg') }}" width="100%" height="250" style="border-radius:10px;" class=" bt-primary">
            
  </a>
  </div>
  </div>
{{-- Hubungi Kami : --}}
<div class="divider text-center pt-2">
  <div class="divider-text">
    <h5 class="text-muted fw-bold"> <i class='bx bxs-contact' ></i> Kontak Kami : </h5>
  </div>
</div>

        <div class="row bg-label secondary mb-3">
          <div class="col-lg-8 col-md-8">
            <div class="bg-secondary p-1 mb-0">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.6820939307827!2d109.30326485575445!3d1.3674259505641846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e4b95de561a647%3A0xdb34ccf6e0859b60!2sRSUD%20Sambas!5e0!3m2!1sid!2sid!4v1674203527527!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="250"></iframe>
            </div>
            </div>
            <div class="col-md-4 col-lg-4">
              
              <div class="bg-label-secondary mb-0" align="center">
               <h3 class="card-title fw-bold mb-2 pt-3"> RSUD SAMBAS </h3>
                <a href="https://facebook.com/rssambas"><img src="{{ asset('assets/img/fb.png') }}" width="50" style="padding:10px;"></a>
                <a href="https://instagram.com/rsudsambasofficial"><img src="{{ asset('assets/img/ig.webp') }}" width="50" style="padding:10px;"> </a>
                <a href="https://www.youtube.com/@rsudsambas6284"><img src="{{ asset('assets/img/yt.png') }}" width="50" style="padding:10px;"> </a>
                
                {{-- <br> <a href='http://www.freevisitorcounters.com'>on Freevisitorcounters.com</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=790d6bc9688e0acb23161cadfb3f636e57f0bac5'></script>
      <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/1089547/t/0"></script>  --}}
          <hr>
            <div class="row p-0 m-0">
              <div class="col-md-8">          
                <ul class="card list-group list-group-flush">
                  <li class="fw-bold list-group-item d-flex align-items-center bg-label-primary"><small> <i class='bx bx-label bx-tada p-2' ></i> Layanan Informasi : </small> </li>
                  <li class="list-group-item d-flex align-items-center"><small> <i class='bx bxs-phone-call p-2'></i> +628115620100 | Informasi - Pengaduan </small></li
                  
                </ul>
              </div>
              <div class="col-md-4 mb-3">
                <a href='http://www.freevisitorcounters.com'>click here</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=1890c7cefd03d05f1fb238aa80b0b41b60521f3d'></script>
                <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/1108646/t/0"></script>
              </div>
            </div>      
              </div>
              </div>
        </div>
        
      {{-- <div class="card p-2 mb-4">
        <div class="card-header bg-label-primary">
          <h5 class="card-title fw-bold mb-2"><i class='bx bxs-help-circle'></i> Komentar / Pertanyaan :</h5>
          <p class="card-text text-muted mb-1"><small> Kritik dan saran demi pelayanan yang baik dan berkualitas </small> </p>
        </div>
        <div class="card-body">
          <form action="/pesan/tambah">
            @csrf 
            <div class="row">
              <div class="col-md-6 col-lg-6">
                  <div class="row pt-2 mb-3">
                  <label class="col-md-3 col-3 col-form-label" for="basic-nama">Nama</label>
                  <div class="col-md-9 col-9">
                    <input type="text" name="nama" class="form-control" id="basic-nama" placeholder="Nama Kamu" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-md-3 col-3 col-form-label" for="basic-email">Email</label>
                  <div class="col-md-9 col-9">
                    <input type="email" name="email" class="form-control" id="basic-email" placeholder="email@contoh.com" required>
                  </div>
                </div>
                  <div class="row mb-3">
                  <label class="col-md-3 col-3 col-form-label" for="basic-hp">No. Hp</label>
                  <div class="col-md-9 col-9">
                    <input type="number" name="hp" class="form-control" id="basic-hp" max-lenght="14" placeholder="08123xxxxxxxx" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="row mb-3 pt-2">
                  <label class="col-md-3 col-form-label" for="basic-default-message">Isi Pesan</label>
                  <div class="col-md-9">
                    <textarea id="basic-default-message" rows="4" name="isi" class="form-control" placeholder="Hai," aria-label="Hai," aria-describedby="basic-icon-default-message2" required></textarea>
                  </div>
                </div>
              <div align="right"> 
                <button type="submit" class="btn btn-primary">
                  <i class='bx bx-send bx-tada' ></i> &nbsp; Kirim
                </button>
              </div>
              </div>
            </div>
        </form>
        </div>
      </div> --}}
      
      {{-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
      <div class="elfsight-app-afc0c044-9e2d-4816-8236-d058f301e739 mx-auto text-center pt-2 mb-3" style="width:100%"></div>
                   --}}
<script src="{{ asset('assets/owlcarousel/vendors/jquery.min.js') }}"></script>
<script src="{{ asset('assets/owlcarousel/owlcarousel/owl.carousel.min.js') }}"></script>

<script>
  $('.loop').owlCarousel({
    lazyLoad:true,
    center: true,
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
        600:{
            items:3
        },
        300:{
            items:2
        }
    }
});
$('.loop-header').owlCarousel({
    lazyLoad:true,
    center: true,
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:4000,
    dots: false,
    responsive:{
        600:{
            items:2
        }
    }
});


$('.loop-dokter').owlCarousel({
    lazyLoad:true,
    center: true,
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    dots: false,
    responsive:{
      600:{
            items:3
        },
      300:{
            items:2,
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
        }
    }
});
</script>

{{-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-c9f705b3-632e-4171-8a91-5b379f33ceaa"></div> --}}
@endsection