function confirmDelete(slug) {
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
      form.action = '/dashboard/services/' + slug;

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

      Swal.fire(
        "Terhapus!",
        "Data berhasil dihapus.",
        "success"
      );
      location.reload();
    }
  });
}



function confirmDeleteDetails(id) {
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
      form.action = '/dashboard/services/details/' + id;

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

      Swal.fire(
        "Terhapus!",
        "Data berhasil dihapus.",
        "success"
      );
      location.reload();
    }
  });
}

const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('change', function(){
  fetch('/dashboard/services/checkSlug?title=' + title.value)
    .then( response => response.json())
    .then( data => slug.value = data.slug)
})

