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
    <form action="/dashboard/profil/umum/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
    <h2 class="section-title"> Edit Profil Umum </h2>
    <p class="section-lead">Kelola Profil Umum Rumah Sakit</p>
<hr>
    @include('dashboard.layouts.notif')

    <div class="row">
            <div class="col-md-4">
              <div class="card card-info">
                <div class="card-header">
                  <h4><i class="fa fa-bookmark"></i>  Menu : </h4>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column">
                     <li class="nav-item"><a class="nav-link active" id="visimisi-tab4" data-toggle="tab" href="#visimisi" role="tab" aria-controls="visimisi" aria-selected="false"><i class="fas fa-archive p-2"></i> Visi Misi</a></li>
                    <li class="nav-item"><a class="nav-link" id="struktur-tab4" data-toggle="tab" href="#struktur" role="tab" aria-controls="struktur" aria-selected="false"><i class="fas fa-cubes p-2"></i> Struktur Organisasi</a></li>
                    
                </div>
              </div>
            </div>
        <div class="col-md-8">
            <div class="tab-content no-padding" id="myTab2Content">
            <div class="tab-pane fade show active" id="visimisi" role="tabpanel" aria-labelledby="visimisi-tab4">
              
                    <div class="card card-warning" id="settings-card">
                      <div class="card-header">
                        <h4>Visi Misi Rumah Sakit</h4>
                      </div>
                      <div class="card-body">
                         
                        <p class="text-muted">Silahkan masukkan Visi Misi Rumah Sakit.</p>    
                        
                        <div class="form-group mb-3">
                            <label> Visi </label>
                            <input type="hidden" id="visi" class="@error('visi') is-invalid @enderror" name="visi"  value="{{ old('visi', $data->visi) }}" required>
                            <trix-editor input="visi"></trix-editor>                                     
                        </div>

                           
                        <div class="form-group mb-3">
                          <label> Misi </label>
                          <input type="hidden" id="misi" class="@error('misi') is-invalid @enderror" name="misi"  value="{{ old('misi', $data->misi) }}" required>
                          <trix-editor input="misi"></trix-editor>                                     
                        </div> 

                      <div class="form-group mb-3">
                          <label> Moto </label>
                          <input type="hidden" id="moto" class="@error('slogan') is-invalid @enderror" name="moto"  value="{{ old('slogan', $data->slogan) }}" required>
                          <trix-editor input="moto"></trix-editor>                                     
                      </div>
                    </div>
                    
                    <div class="card-footer bg-whitesmoke" align="right">
                        <button class="btn btn-primary"> <i class="fa fa-save""></i> | Simpan </button>
                       </div>
                </div>
            </form>
        </div>

        
        <div class="tab-pane fade" id="struktur" role="tabpanel" aria-labelledby="struktur-tab4">
          <form action="/dashboard/profil/umum/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
                <div class="card card-warning" id="settings-card">
                  <div class="card-header">
                    <h4>Struktur Organisasi</h4>
                  </div>
                  <div class="card-body">
                     
                    <p class="text-muted">Silahkan masukkan Stuktur Organisasi Rumah Sakit.</p>    
                        
                    <div class="form-group mb-3">      
                        <label>Upload Gambar :</label>
                         <div id="image-preview" class="image-preview mb-3" style="width: 100%;  background-image: url('{{ asset('storage/'.$data->struktur) }}'); background-size: cover;  background-repeat: no-repeat, repeat; ">
                           <label for="image-upload" id="image-label">Choose File</label>
                           <input type="file" name="struktur" id="image-upload" value="{{ old('struktur') }}" />
                         @error('struktur')
                           <div class="invalid-feedback">
                             {{  $message }}
                           </div>
                         @enderror
                       </div>
                </div>
            </div>
            
            <div class="card-footer bg-whitesmoke" align="right">
                <button class="btn btn-primary"> <i class="fa fa-save""></i> | Simpan </button>
               </div>
        </form>
    </div>


    </div>
</div>
</div>
</div>
</section>


@endsection