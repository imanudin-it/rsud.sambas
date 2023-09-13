@extends('dashboard.layouts.main')

@section('container')
<section class="section">
<div class="section-header">
    <div class="section-header-back">
      <a href="/dashboard/" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>{{ $title }}</h1>
    
</div>
<div class="section-body">
    <h2 class="section-title"> {{ $data->name }} </h2>
    <p class="section-lead">Perubahan pada {{ $data->name }}</p>
    @if(session()->has('success'))
              <div class="alert alert-success">
                <i class="fa fa-check"></i> &bull; {{ session('success') }}
              </div>
            @endif
    <div class="row mt-4">
        <div class="col-12">
           <div class="card p-0">
                <form action="/dashboard/services/details/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="card-body">
                            <div id="image-preview" class="image-preview p-5" style="width: 100%; height:300px;  background-image: url('{{ asset('storage/'.$data->image) }}'); background-size: cover;  background-repeat: no-repeat, repeat; ">
                            <label for="image-upload" id="image-label">Service Thumbnail</label>
                            <input type="file" name="image" id="image-upload" value="" />
                            </div>
                        </div>
                    </div>
                <div class="col-md-8 col-lg-8">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label> Name </label>
                            <input type="text" class="@error('name') is-invalid @enderror form-control " name="name" id="title"  value="{{ old('name',$data->name) }}" autocomplete="off" required>
                        </div>
                        <div class="form-group mt-0">
                            <label> Description </label>
                            <input type="hidden" id="descriptions" class="@error('descriptions') is-invalid @enderror" name="descriptions"  value="{{ old('descriptions', $data->descriptions) }}" required>
                            <trix-editor input="descriptions"></trix-editor>
                                        
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


@endsection