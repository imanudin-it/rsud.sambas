@extends('dashboard.layouts.main')

@section('container')
<section class="section">
<div class="section-header">
    <div class="section-header-back">
      <a href="/dashboard/" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>{{ $title }}</h1>
    <div class="section-header-button">
      <a href="/dashboard/posts/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
    </div>
</div>
<div class="section-body">
    <h2 class="section-title"> Menampilkan Artikel </h2>
    <p class="section-lead">Halaman untuk kelola artikel</p>

    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="fa fa-newspaper p-2"></i> Semua Post / Artikel</h4>
          </div>
          <div class="card-body table-responsive p-0">
            @if(session()->has('success'))
              <div class="alert alert-success">
                <i class="fa fa-check"></i> &bull; {{ session('success') }}
              </div>
            @endif
            <div class="float-left mb-2 p-2">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/posts">&bull; Semua</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboard/posts/draft') ? 'active' : '' }}" href="/dashboard/posts/draft">&bull; Draft </span></a>
                </li>
                
              </ul>
            </div>
            <div class="float-right p-2">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search">
                  <div class="input-group-append">                                            
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>

            <div class="clearfix mb-2"></div>
            
            
        <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th >No</th>
            <th >Judul Artikel</th>
            <th >Kategori</th>
            <th >Tgl Dibuat</th>
            <th >Status</th>
            <th >Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $posts as $post)
              <tr>
                <td> {{  $loop->iteration }} </td>
                <td> <a href="/dashboard/posts/{{ $post->slug }}">{{  $post->title }}</a></td>
                <td> {{  $post->category->name }}</td>
                <td> {{  date('d-m-Y', strtotime($post->created_at)) }}</td>
                <td class="text-center"> @if(!empty($post->published_at)) <div class="badge badge-success">Published</div>  @else <div class="badge badge-warning"> Draft </div> @endif </td>
                <td class="text-center"> 
                  <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                    @method('delete')
                    @csrf
                   <div class="btn-group">
                    <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit/" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                      <button class="btn btn-danger" title="Hapus" onclick="return confirm('Are you sure to delete this post ?')"><i class="fas fa-times"></i></button>
                  </div>
                  </form>
                </td>
              </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="6"> Jumlah :  <span class="badge badge-info">{{ $posts->count() }}</span></td>
          </tr>
        </tfoot>
      </table>
      <div class="pagination justify-content-end p-2" align="right" style="text-align: center;">
        {{ $posts->links() }} 
     </div>
  
    </div>
    
  </div>
</section> 
@endsection