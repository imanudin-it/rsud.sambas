@extends('dashboard.layouts.main')

@section('container')
<section class="section">
<div class="section-header">
    <div class="section-header-back">
      <a href="/" class="btn btn-icon"><i class="fas fa-home"></i></a>
    </div>
    <h1>{{ $title }}</h1>
    
</div>
<div class="section-body">
    <h2 class="section-title"> Selamat Datang {{ Auth::user()->name }} </h2>
    <p class="section-lead">Halaman Dashboard</p>

    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="fa fa-newspaper p-2"></i> - </h4>
          </div>
         
  
    </div>
    
  </div>
</section> 
@endsection