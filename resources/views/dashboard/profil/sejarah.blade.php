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
    <form action="/dashboard/profil/sejarah/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
    <h2 class="section-title"> Sejarah </h2>
    <p class="section-lead">Kelola Sejarah Rumah Sakit</p>
<hr>
    @include('dashboard.layouts.notif')

    <div class="row">
            <div class="col-md-12">
                  <div class="card card-info" id="settings-card">
                    <div class="card-header">
                      <h4>Sejarah RS</h4>
                    </div>
                    <div class="card-body">
                       
                      <p class="text-muted">Silahkan masukkan sejarah Rumah Sakit.</p>    
                      <div class="form-group mb-3">      
                   <label>Foto Utama :</label>
                    <div id="image-preview" class="image-preview mb-3" style="width: 100%;  background-image: url('{{ asset('storage/'.$data->image) }}'); background-size: cover;  background-repeat: no-repeat, repeat; ">
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="image" id="image-upload" value="{{ old('image') }}" />
                    @error('image')
                      <div class="invalid-feedback">
                        {{  $message }}
                      </div>
                    @enderror
                  </div>
                <div class="form-group mb-3">
                    <label> Sejarah </label>
                    <input type="hidden" id="sejarah" class="@error('sejarah') is-invalid @enderror" name="sejarah"  value="{{ old('sejarah', $data->sejarah) }}" required>
                    <trix-editor input="sejarah"></trix-editor>
                                
                </div>
                    </div>
                    </div>
                    <div class="card-footer bg-whitesmoke" align="right">
                        <button class="btn btn-primary"> <i class="fa fa-save""></i> | Simpan </button>
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