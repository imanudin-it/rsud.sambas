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
          <div class="card-body table-responsive p-0">
            @if(session()->has('success'))
              <div class="alert alert-success">
                <i class="fa fa-check"></i> &bull; {{ session('success') }}
              </div>
            @endif
            
            <div class="clearfix mb-2"></div>      
            <table class="table table-striped">
                <thead> <tr>
            <th >No</th>
            <th >Name</th>
            <th > Photos </th>
             <th >Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $galeries as $galeri)
              <tr>
                <td width="2%"> {{  $loop->iteration }} </td>
                <td width="78%"> <a href="/dashboard/galeri/{{ $galeri->id }}"> {{  $galeri->name }} </a></td>
                <td width="10%"> {{  $galeri->galeri_foto()->count() }}</td>
                <td class="text-center" width="10%"> 
                    <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                   <div class="btn-group">
                    <a href="#" class="btn btn-warning" title="Edit" data-toggle="modal" data-target="#editGaleri{{ $loop->iteration }}"><i class="fas fa-edit"></i></a>
                      <button class="btn btn-danger" type="submit" title="Hapus" onclick="return confirm('Are you sure to delete this Galeri ?')"><i class="fas fa-times"></i></button>
                     </form>
                </td>
              </tr>

              
          @endforeach
        </tbody>
        <tfoot>
            <tr>
              <td colspan="6"> Jumlah :  <span class="badge badge-info">{{ $galeries->count() }}</span></td>
            </tr>
          </tfoot>
        </table>
        <div class="pagination justify-content-end p-2" align="right" style="text-align: center;">
          {{ $galeries->links() }} 
       </div>
      </table>
      
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