@extends('layouts.main')

@section('container')
<div class="container-xxl flex-grow-1 pt-3">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <div class="card mb-3">
          <div class="card-header bg-label-secondary"> 
            <div class="card-title"> 
            <h2> {{ $title }} </h2>
            </div>
            </div>
            <div class="card-body pt-4" align="justify">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-info mb-1">
                    <div class="card-body p-2">
                        <img src="{{ asset('storage/'.$data->image) }}" style="width:100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item"><i class='bx bxs-user-account'></i>  {{ $data->nama }}</li>
                    <li class="list-group-item"><i class='bx bxs-bolt-circle'></i> {{ $data->jabatan }} </li>
                    <li class="list-group-item"><i class='bx bx-buildings' ></i> RSUD Sambas </li>
                   
                  </ul> 
            </div>
        </div>
                <p>{!! $data->isi !!}</p>
                   
            </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-4">
        @include('layouts.menu-kanan')
      </div>
    </div>
</div>
@endsection
