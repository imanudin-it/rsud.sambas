@extends('dashboard.layouts.main')

@section('container') 
<style>
  .preview-image {
      width: 50px;
      height: 50px;
      margin: 5px;
  }
</style>
<section class="section">
  
<div class="section-header">
    <div class="section-header-back">
      <a href="/dashboard/galeri/" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>{{ $title }}</h1>
   
</div>
<div class="section-body">
  <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus"></i> Add New Photos</button>

    <div class="row">
      <div class="col-12">
        <div class="card p-0">
          <div class="card-body p-2">
            @include('dashboard.layouts.notif')
            <!-- Menampilkan pesan kesalahan -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="clearfix mb-2"></div>      
            <div class="row">
           @foreach ( $foto as $galeri)
                <div class="col-lg-3 col-md-3 col-4">
          <div class="card">
            <form action="/dashboard/galeri-foto/{{ $galeri->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <img src="{{ asset('storage/'.$galeri->image_path.'') }}" width="100%" height="100">
                    <div class="card-footer p-0 text-right mb-1">
                        <div class="btn-group btn-sm">
                            <button class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Are you sure to delete this Photo ?')"><i class="fas fa-times"></i></button> </div>
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
        <form action="/dashboard/galeri-foto" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title">Add New Photos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="galery_id" value="{{ $galeries->id }}">
          <label for="fileInput" class="form-label">Images</label>
            <div class="mb-3 custom-file">
              <input class="custom-file-input" type="file" name="foto[]" id="fileInput" multiple="">
            <label class="custom-file-label">Choose File</label>
          </div>
          <div class="row"  id="previewContainer"></div>
          <div id="errorText" class="text-danger"></div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
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
    // Fungsi untuk menampilkan preview gambar
    function previewImages() {
        var previewContainer = document.getElementById('previewContainer');
        var fileInput = document.getElementById('fileInput');
        var errorText = document.getElementById('errorText');
        var files = fileInput.files;

          previewContainer.innerHTML = ''; // Bersihkan container preview
          errorText.textContent = ''; // Bersihkan pesan kesalahan

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;

            if (file.type.match(imageType)) {
                var img = document.createElement('img');
                img.classList.add('preview-image');
                img.file = file;

                // Tambahkan tombol hapus
                var deleteButton = document.createElement('button');
                deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                deleteButton.innerHTML = '<i class="fa fa-times"></i>';
                deleteButton.innerHTML = '<i class="fa fa-times"></i>';
                deleteButton.addEventListener('click', function() {
                    this.parentElement.remove(); // Hapus gambar saat tombol ditekan
                });

                col = document.createElement('div');
                    col.classList.add('col-lg-3','col-3','col-md-3'); // Tambahkan class "col-lg-3" untuk format grid
                    col.appendChild(img);
                    col.appendChild(deleteButton);
                    previewContainer.appendChild(col);

                var reader = new FileReader();
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                })(img);

                reader.readAsDataURL(file);
            }else {
                    // Tampilkan pesan kesalahan jika bukan file gambar
                    errorText.textContent = 'File yang dipilih bukan gambar.';
                }
        }
    }

    // Panggil fungsi previewImages() saat file diunggah berubah
    document.getElementById('fileInput').addEventListener('change', previewImages);
</script>


@endsection