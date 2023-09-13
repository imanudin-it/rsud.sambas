@extends('dashboard.layouts.main')

@section('container') 

<section class="section">
  
<div class="section-header">
    <div class="section-header-back">
      <a href="/dashboard/" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>{{ $title }}</h1>
    <div class="section-header-button">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus"></i> Add New Category</button>
    </div>
</div>
<div class="section-body">
    <h2 class="section-title"> Categories </h2>
    <p class="section-lead">Manage Categories</p>

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
            <th > Posts </th>
             <th >Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $categories as $category)
              <tr>
                <td width="2%"> {{  $loop->iteration }} </td>
                <td width="78%"> {{  $category->name }}</td>
                <td width="10%"> {{  $category->posts()->count() }}</td>
                <td class="text-center" width="10%"> 
                  <form action="/dashboard/categories/{{ $category->slug }}" method="POST">
                    @method('delete')
                    @csrf
                   <div class="btn-group">
                    <a href="#" class="btn btn-warning" title="Edit" data-toggle="modal" data-target="#editCategory{{ $loop->iteration }}"><i class="fas fa-edit"></i></a>
                      <button class="btn btn-danger" title="Hapus" onclick="return confirm('Are you sure to delete this category ?')"><i class="fas fa-times"></i></button>
                     </form>
                </td>
              </tr>

              {{-- Add New Category --}}
 {{-- <div class="modal fade" data-backdrop="false"  role="dialog" id="editCategory{{ $loop->iteration }}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="/dashboard/categories/{{ $category->slug }}" method="POST">
          @method('put')  
          @csrf
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-edit"></i> Edit : {{ $category->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}"autofocus>
              </div>

              <div class="form-group">
                <label><em> Slug </em></label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}" readonly>
              </div>

        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>  
    </div>
  </div> --}}
          @endforeach
        </tbody>
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
        <form action="/dashboard/categories" method="POST">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control">
              </div>

              <div class="form-group">
                <label><em> Slug </em></label>
                <input type="text" class="form-control" id="slug" name="slug" readonly>
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
  <script>
    
    const title = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
      fetch('/dashboard/categories/checkSlug?name=' + title.value)
        .then( response => response.json())
        .then( data => slug.value = data.slug)
    })
</script>

@endsection