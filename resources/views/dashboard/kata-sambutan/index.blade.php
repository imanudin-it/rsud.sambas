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
    <form action="/dashboard/kata-sambutan/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
    <h2 class="section-title"> Edit Kata Sambutan </h2>
    <p class="section-lead">Silahkan tulis kata sambutan !</p>
    @if(session()->has('success'))
              <div class="alert alert-success">
                <i class="fa fa-check"></i> &bull; {{ session('success') }}
              </div>
            @endif
            
    <div class="row mt-4">
        <div class="col-12">
           <div class="card">
            <div class="card-body p-3">
                      
             
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div id="image-preview" class="image-preview p-5" style="width: 100%; height:300px;  background-image: url('{{ asset('storage/'.$data->image) }}'); background-size: cover;  background-repeat: no-repeat, repeat; ">
                            <label for="image-upload" id="image-label">Service Thumbnail</label>
                            <input type="file" name="image" id="image-upload" value="" />
                            </div>
                        
                        </div>
                <div class="col-md-8 col-lg-8" >
                    
                      
                        <div class="form-group mb-4">
                            <label> Nama </label>
                            <input type="text" class="@error('name') is-invalid @enderror form-control " name="nama" id="title"  value="{{ old('name',$data->nama) }}" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-4">
                            <label> Jabatan </label>
                            <input type="text" class="@error('jabatan') is-invalid @enderror form-control " name="jabatan" id="title"  value="{{ old('jabatan',$data->jabatan) }}" autocomplete="off" required>
                        </div>
                        <hr class="text-muted">
                <div class="form-group mt-0">
                    <label> Isi Sambutan </label>
                    <input type="hidden" id="isi" class="@error('isi') is-invalid @enderror" name="isi"  value="{{ old('descriptions', $data->isi) }}" required>
                    <trix-editor input="isi"></trix-editor>
                                
                </div>
                    </div>
                </div>
                
            </div>
                    <div class="card-footer bg-whitesmoke" align="right">
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