@extends('dashboard.layouts.main')

@section('container')

<section class="section">
<div class="section-header">
    <div class="section-header-back">
      <a href="#" onclick="window.history.back()" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>{{ $title }}</h1>
</div>
<div class="section-body">
    <h2 class="section-title">Details {{ $title }} </h2>
    <p class="section-lead">Kelola Data untuk tampilan {{ $title }}</p>
    @include('dashboard.layouts.notif')
    <div class="row mt-4">
        <div class="col-12">
           <div class="bg-whitesmoke p-2 text-right mb-3">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-plus"></i> | Add New </button>
                  </button>

                  <div class="collapse" id="collapseExample" align="left">
                    <hr class="text-muted">
                    <div class="card p-0">
                        <form action="/dashboard/informasi-umum" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label> Name </label>
                                    <input type="text" class="@error('name') is-invalid @enderror form-control " name="nama" id="title"  value="{{ old('nama') }}" autocomplete="off" required>
                                    </div>
                               
                                    <div class="form-group mb-4">
                                        <label> File PDF </label>
                                        <div class="custom-file">
                                        <input name="file" type="file" class="custom-file-input" id="customFile" onchange="updateFileName()">
                                        <label class="custom-file-label" for="customFile" id="fileLabel">Choose file</label>
                                      <div></div></div>
                                    </div>
                                </div>
                               <div class="card-footer bg-light m-0" align="right">
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
       
                @if($data->count())
                <table class="table table-striped dataTable no-footer" id="table-2" role="grid" aria-describedby="table-1_info">
                    <thead class="table-info ">
                        <tr>
                        <th width="5%">No</th>
                        <th width="50%">Name</th>
                        <th width="35%">Name</th>
                        <th width="10%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $row)
                   <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $row->nama }} </td>
                    <td> <a href="{{ asset('storage/'.$row->file.'') }}" target="_blank">{{ $row->file }}</a> </td>
                     <td align="center"> <div class="btn-group">
                        <button type="button" onclick="confirmDelete({{ $row->id }})" class="btn btn-danger" title="Hapus ?"><i class="fa fa-times"></i></button>
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

<script>
    function updateFileName() {
        // Ambil input elemen berdasarkan ID
        const fileInput = document.getElementById('customFile');

        // Ambil label elemen berdasarkan ID
        const fileLabel = document.getElementById('fileLabel');

        // Periksa apakah pengguna telah memilih file
        if (fileInput.files.length > 0) {
            // Perbarui teks label dengan nama file yang dipilih
            fileLabel.textContent = fileInput.files[0].name;
        } else {
            // Jika pengguna tidak memilih file, kembalikan ke "Choose file"
            fileLabel.textContent = 'Choose file';
        }
    }

    function confirmDelete(id) {
  Swal.fire({
    title: "Hapus?",
    text: "Anda yakin ingin menghapus data ini?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Ya, Hapus!",
    cancelButtonText: "Batal"
  }).then((result) => {
    if (result.isConfirmed) {
      
      // Mengambil token CSRF dari meta tag
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      // Membuat elemen form sementara
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = '/dashboard/informasi-umum/' + id;

      // Menambahkan input untuk method DELETE dan token CSRF
      const methodInput = document.createElement('input');
      methodInput.name = '_method';
      methodInput.value = 'DELETE';
      const csrfInput = document.createElement('input');
      csrfInput.name = '_token';
      csrfInput.value = csrfToken;

      // Menambahkan input ke dalam form
      form.appendChild(methodInput);
      form.appendChild(csrfInput);

      // Menyembunyikan form dari tampilan
      form.style.display = 'none';

      // Menambahkan form ke dalam body dokumen
      document.body.appendChild(form);

      // Submit form untuk menghapus data
      form.submit();

      // Membersihkan form setelah pengiriman
      form.remove();
      
      location.reload();
    }
  });
}
</script>


@endsection