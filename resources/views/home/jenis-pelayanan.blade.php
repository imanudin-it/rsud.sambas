@extends('layouts.main')

@section('container')

<div class="container-xxl flex-grow-1 pt-3">
    
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="divider text-center">
                <div class="divider-text">
                    <h5 class="text-muted fw-bold"> <i class='bx bxs-component bx-tada' ></i> {{ $title }} : </h5>
                </div>
            </div>
            @foreach ($data as $row)
                
                    <div class="card shadow mb-2">
                        <div class="card-body p-3 mb-1">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 mb-3 p-4">
                                    @if($row->image)
                                    <img class="img img-rounded" src="{{ asset('storage/'.$row->image) }}" width="100%" height="150">
                                     @else
                                     <img class="img img-rounded" src="{{ asset('assets/img/news/img13.jpg') }}" width="100%"  height="150">
                                    @endif
                                </div>
                                <div class="col-md-8 col-lg-8" align="justify">
                                    <h4><i class='bx bx-bookmark-alt-plus'></i> <a href="/jenis-pelayanan/{{ $row->slug }}"> {{ $row->name }}</a></h4>
                                    <hr class="text-muted mb-3">
                                    <p class="card-text"> {{  str_replace('<div>','',Str::limit($row->description, '300','...'))  }} </p>
                                        <div align="right" class="pt-2">
                                            <a class="btn btn-sm btn-secondary " href="/jenis-pelayanan/{{ $row->slug }}"> Lihat Selengkapnya &raquo; </a>
                                         </div> 
                                   </div>
                                 
                            </div>
                        </div>
                    </div>
            @endforeach
            <div class="pagination justify-content-end bg-whitesmoke p-2" align="right" style="text-align: center;">
                {{ $data->links() }} 
             </div>
    </div>
       
    <div class="col-lg-4 col-md-4">
        @include('layouts.menu-kanan')
    </div>
    </div>
 
@endsection
