@extends('layouts.main')

@section('container')
<div class="container-xxxl flex-grow-1 pt-3">
  <div class="row">
    <div class="col-lg-8 col-md-12">
      <div class="card mb-3">
        <div class="card-header bg-label-secondary"> 
          <div class="card-title"> 
          <h2> {{ $title }} RSUD Sambas</h2>
          </div>
          </div>
          <div class="card-body pt-4" align="justify">
        @if(request('kat')=='sejarah')
                        <div style="max-height: 400px; overflow:hidden;" class="shadow">
                            <img src="{{ asset('storage/'.$data->image) }}" width="100%" class="p-0">
                        </div>
                        <div class="article-details text-justify">
                            <p>{!! $data->sejarah !!}</p>
                        </div>
                        @else
                        <div style="max-height: 400px; overflow:hidden;" class=" mb-3">
                          <img src="{{ asset('storage/post-images/visi-misi.png') }}" width="100%" class="p-0">
                      </div>
                      <div class="article-details text-justify mb-3 ">
                        <div class="card mb-2">
                          <div class="card-body">
                            <h5 class="card-title">Visi</h5>
                            <p class="card-text"> {!! $data->visi !!}</p>
                          </div>

                        </div>
                        <div class="card mb-2">
                          <div class="card-body">
                            <h5 class="card-title">Misi</h5>
                            <p class="card-text"> {!! $data->misi !!}</p>
                          </div>

                        </div>
                        <div class="card mb-2">
                          <div class="card-body">
                            <h5 class="card-title">Moto</h5>
                            <p class="card-text"> {!! $data->moto !!}</p>
                          </div>

                        </div>
                        </div>
                    @endif
                        {{-- @if($subdata->count())
                        <div class="card card-info">
                            <div class="card-header">
                              <h4><i class="fa fa-bookmark p-1"></i> Fasilitas Terkait :</h4>
                              <div class="card-header-action">
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i> Lihat</a>
                              </div>
                            </div>
                            <div class="collapse" id="mycard-collapse" style="">
                              <div class="card-body">
                                
                                    <ul class="list-unstyled list-unstyled-border"> 
                                        @foreach ($subdata as $row)
                                        
                                        <li class="media">
                                            <img class="mr-3 rounded" src="{{ asset('storage/'.$row->image) }}" alt="image" width="55">
                                            <div class="media-body">
                                               
                                                        <div class="media-title"><a href="/jenis-pelayanan/{{ $row->slug }}">{{ $row->name }}</a></div>
                                                        <span class="text-small text-muted"> {!! $row->descriptions !!}</span>
                                            </div>
                                        </li>
                            
                                    @endforeach
                            
                                    </ul>
                              </div>
                            </div>
                          </div>
                          @endif --}}
                   </div>
        </div>
    </div>
<div class="col-lg-4 col-md-12">
  @include('layouts.menu-kanan')
</div>
  </div>
@endsection
