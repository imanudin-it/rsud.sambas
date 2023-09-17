@extends('dashboard.layouts.main')

@section('container') 

<section class="section">
  
<div class="section-header">
    <div class="section-header-back">
      <a href="/dashboard/" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>{{ $title }}</h1>
    <div class="section-header-button">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus"></i> Add New Gallery</button>
    </div>
</div>
<div class="section-body">
    <h2 class="section-title"> Gallery </h2>
    <p class="section-lead">Manage Gallery Photos</p>

    <div class="row">
      <div class="col-12">
        <div class="card p-0">
          <div class="card-body p-2">
            @if(session()->has('success'))
              <div class="alert alert-success">
                <i class="fa fa-check"></i> &bull; {{ session('success') }}
              </div>
            @endif
            
            <div class="clearfix mb-2"></div>      
            <div class="row">
           @foreach ( $foto as $galeri)
                <div class="col-lg-3 col-md-3 col-4">
          <div class="card">
            <form action="/dashboard/galeri_foto/{{ $galeri->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <img src="" width="100%" height="100">
                    <div class="card-footer p-0 text-right mb-1">
                        <div class="btn-group btn-sm">
                            <button class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Are you sure to delete this Galeri ?')"><i class="fas fa-times"></i></button> </div>
                    </div>
                     </form>
                    </div>
                </div>
          @endforeach
            </div>
          </div>
        <div class="pagination justify-content-end p-2" align="right" style="text-align: center;">
          {{ $foto->links() }} 
       </div>
      
    </div>
    
  </div>

</div>
    </div>
</div>
</section>
 {{-- Add New Category --}}
 <div class="modal fade" tabindex="-1" role="dialog" id="addCategory">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="/dashboard/galeri" method="POST">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title">Add New Gallery</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control">
              </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>  
    </div>
  </div>

  <div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalMdTitle"></h4>
            </div>
            <div class="modal-body">
                <div class="modalError"></div>
                <div id="modalMdContent"></div>
            </div>
        </div>
    </div>
  </div>

@endsection