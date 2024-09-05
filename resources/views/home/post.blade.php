@extends('layouts.main')

@section('container')
<style>
  .modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.7); /* Warna hitam dengan transparansi 70% */
}

 .close {
  position: absolute;
  top: 15px;
  right: 35px;
  font-size: 100px;
  font-weight: bold;
  color: #f1f1f1;
  cursor: pointer;
}
</style>
<link rel="stylesheet" href="{{ asset('assets/owlcarousel/owlcarousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/owlcarousel/owlcarousel/assets/owl.theme.default.min.css') }}">

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
                            <br>
                        </div>
                    @if($post->gallery()->count())
                    <div class="divider text-center">
                      <div class="divider-text">
                        <h5 class="text-muted fw-bold"> <i class='bx bxs-contact' ></i> Galery : </h5>
                      </div>
                    </div>
                    <div class="card bg-label-secondary bt-primary p-0 m-0 mb-4 loop owl-carousel owl-theme owl-loaded">
                      <div class="card-body p-3 ">
                      <div class="owl-stage-outer">
                          <div class="owl-stage">
                        @foreach ($post->gallery as $foto)
                        
                        <div class="owl-item">
                          <div class="card">
                            <div class="card-body pt-0" style="max-height: 200px; overflow: hidden;">
                             <img alt="image" src="{{ asset('/storage/'.$foto->image_path) }}" width="100%" height="200"class="modal-trigger" onclick="openModal('{{ asset('/storage/'.$foto->image_path) }}')">
                          </div>
                          </div>
                        </div>

                        @endforeach
                          </div>
                      </div>
                      </div>
                    </div>
                    @endif
                <div class="p-3 bg-whitesmoke text-right">
                    <i class="fa fa-eye"></i> {{ $post->reads }} views &bull; <i class="fa fa-user p-1"></i> Post by : {{ $post->author->name }}
                </div>   
                    </article>
  {{-- MODAL IMAGE --}}
  <div id="myModal" class="modal p-3">
    <span class="btn btn-danger mb-3" onclick="closeModal()"> TUTUP </span>
    <img class="modal-content" id="modalImg">
  </div>
  {{-- end modal --}}
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
        <hr>
        <div class="mb-4" align="center">
        <a href='http://www.freevisitorcounters.com'>click here</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=1890c7cefd03d05f1fb238aa80b0b41b60521f3d'></script>
                <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/1108646/t/0"></script>
        </div>
              </div>
      </div>
</div>

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
        }
    }
});

function openModal(imageSrc) {
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementById("modalImg");
  modal.style.display = "block";
  modalImg.src = imageSrc;
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

var modalTriggers = document.querySelectorAll(".modal-trigger");

modalTriggers.forEach(function(trigger) {
  trigger.addEventListener("click", function() {
    var imageUrl = trigger.getAttribute("src");
    openModal(imageUrl);
  });
});

</script>

@endsection
