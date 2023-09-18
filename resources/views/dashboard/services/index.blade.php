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
    <h2 class="section-title"> Services/Layanan </h2>
    <p class="section-lead">Manage Services/Layanan</p>
    @if(session()->has('success'))
              <div class="alert alert-success">
                <i class="fa fa-check"></i> &bull; {{ session('success') }}
              </div>
            @endif
    <div class="row mt-4">
        <div class="col-12">
           <div class="bg-whitesmoke p-2 text-right mb-3">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-plus"></i> | Add New Service </button>
                  </button>

                  <div class="collapse" id="collapseExample" align="left">
                    <hr class="text-muted">
                    <div class="card p-0">
                        <form action="/dashboard/services" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">

                            <div class="col-md-4 col-lg-4">
                                <div class="card-body">
                                    <div id="image-preview" class="image-preview p-5" style="width: 100%; height:300px;">
                                    <label for="image-upload" id="image-label">Service Thumbnail</label>
                                    <input type="file" name="image" id="image-upload" value="" />
                                 </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="card-body">
                                <div class="form-group mb-4">
                                    <label> Name </label>
                                   <input type="text" class="form-control " name="name" id="title"  value="{{ old('name') }}" autocomplete="off" required>
                               </div>
                               <div class="form-group mb-4">
                                     <label> <em> Service Slug</em> </label>
                                    <input type="text" class="form-control " name="slug" id="slug"  value="{{ old('slug') }}" autocomplete="off" required readonly>
                                </div>
                                <div class="form-group mt-0">
                                    <label> Description </label>
                                    <input type="hidden" id="description" class="@error('description') is-invalid @enderror" name="description"  value="{{ old('description') }}" required>
                                    <trix-editor input="description"></trix-editor>
                                    
                               </div>
                                </div>
                               <div class="card-footer m-0" align="right">
                                <div class="form-group mb-2">
                                    <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-times"></i> | Close </button>
                                      </button> 
                                      <button class="btn btn-primary"> <i class="fa fa-save""></i> | Save </button></div>
                            </div>
                            </div>

                        </div>
                        </form>
                  </div>
            </div>
            
        </div>
        <div class="col-lg-12 collapse" id="btnEdit" align="left">
            <hr class="text-muted">
            <div class="card p-0">
                <form action="/dashboard/services" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">

                    <div class="col-md-4 col-lg-4">
                        <div class="card-body">
                            <div id="image-preview" class="image-preview p-5" style="width: 100%; height:300px;">
                            <label for="image-upload" id="image-label">Service Thumbnail</label>
                            <input type="file" name="image" id="image-upload" value="" />
                         </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8">
                        <div class="card-body">
                        <div class="form-group mb-4">
                            <label> Name </label>
                           <input type="text" class="form-control " name="EditName" id="EditName"  value="{{ old('EditName') }}" autocomplete="off" required>
                       </div>
                       <div class="form-group mb-4">
                             <label> <em> Service Slug</em> </label>
                            <input type="text" class="form-control " name="EditSlug" id="EditSlug"  value="{{ old('EditSlug') }}" autocomplete="off" required readonly>
                        </div>
                        <div class="form-group mt-0">
                            <label> Description </label>
                            <input type="hidden" id="EditDescription" class="@error('EditDescription') is-invalid @enderror" name="description"  value="{{ old('EditDescription') }}" required>
                            <trix-editor input="EditDescription" id="EditTrix"></trix-editor>
                            
                       </div>
                        </div>
                       <div class="card-footer m-0" align="right">
                        <div class="form-group mb-2">
                            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#btnEdit" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-times"></i> | Close </button>
                              </button> 
                              <button class="btn btn-primary"> <i class="fa fa-save""></i> | Save </button></div>
                    </div>
                    </div>

                </div>
                </form>
          </div>
    </div>
    @if($data->count())
    <table class="table table-striped dataTable no-footer" id="table-2" role="grid" aria-describedby="table-1_info">
        <thead class="table-info ">
            <tr>
            <th width="5%">No</th>
            <th width="10%">Image</th>
            <th width="75%">Name</th>
            <th width="10%">Options</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $row)
       <tr>
        <td>{{ $loop->iteration }}</td>
        <td align="center"><img src="{{ asset('/storage/'.$row->image.'') }}" style="width:50px; height:60px;"></td>
        <td> {{ $row->name }} </td>
         <td> <div class="btn-group">
            <a href="/dashboard/services/{{ $row->slug }}" class="btn btn-secondary btn-sm"> Details <span class="badge badge-sm badge-info">{{ $row->service_details->count() }}</span></a>
            <a href="/dashboard/services/{{ $row->slug }}/edit" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
            <button type="button" onclick="confirmDelete('{{ $row->slug }}'')" class="btn btn-danger" title="Hapus ?"><i class="fa fa-times"></i></button>
            </div> </td>
       </tr>
            @endforeach
        </tbody>
    </table>
    
    @else 
          <div class="col-lg-12">
            <div class="alert alert-danger">
                <div class="alert-title">Tidak Ditemukan !!!</div>
               Belum ada detail terkait.
              </div>
              @endif
                      </div>
                </div>
            
            </div>
        </div>
    </div>
</div>
</section>

<script src="{{ asset('assets/admin/js/web/service.js') }}"></script>
{{-- 

@endsection