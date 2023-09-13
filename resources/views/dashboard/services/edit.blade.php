@extends('dashboard.layouts.main')

@section('container')
<section class="section">
<div class="section-header">
    <div class="section-header-back">
      <a href="/dashboard/services" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>{{ $title }}</h1>
    
</div>
<div class="section-body">
    <h2 class="section-title"> {{ $services->name }} </h2>
    <p class="section-lead">Perubahan pada {{ $services->name }}</p>
    @if(session()->has('success'))
              <div class="alert alert-success">
                <i class="fa fa-check"></i> &bull; {{ session('success') }}
              </div>
            @endif
    <div class="row mt-4">
        <div class="col-12">
           <div class="card p-0">
                <form action="/dashboard/services/{{ $services->slug }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="card-body">
                            <div id="image-preview" class="image-preview p-5" style="width: 100%; height:300px;  background-image: url('{{ asset('storage/'.$services->image) }}'); background-size: cover;  background-repeat: no-repeat, repeat; ">
                            <label for="image-upload" id="image-label">Service Thumbnail</label>
                            <input type="file" name="image" id="image-upload" value="" />
                            </div>
                        </div>
                    </div>
                <div class="col-md-8 col-lg-8">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label> Name </label>
                            <input type="text" class="@error('name') is-invalid @enderror form-control " name="name" id="title"  value="{{ old('name',$services->name) }}" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-4">
                                <label> <em> Service Slug</em> </label>
                            <input type="text" class="@error('slug') is-invalid @enderror form-control " name="slug" id="slug"  value="{{ old('slug', $services->slug) }}" autocomplete="off" required readonly>
                        </div>
                        <div class="form-group mt-0">
                            <label> Description </label>
                            <input type="hidden" id="description" class="@error('description') is-invalid @enderror" name="description"  value="{{ old('description', $services->description) }}" required>
                            <trix-editor input="description"></trix-editor>
                                        
                        </div>
                    </div>
                    <div class="card-footer m-0" align="right">
                         <button class="btn btn-primary"> <i class="fa fa-save""></i> | Simpan </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</section>

<script src="{{ asset('assets/js/web/service-slug.js') }}"></script>


@endsection