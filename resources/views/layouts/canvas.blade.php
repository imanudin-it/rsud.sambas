@php 
    use App\Models\Poliklinik;
    $poly = Poliklinik::where('kode_bpjs', '!=', '')
        ->where('status', '0')
        ->whereNotIn('kode', [42, 44])
        ->orderBy('nama', 'ASC')
        ->get();
@endphp
    
    {{-- Canvas Profile --}}
    <div
    class="offcanvas offcanvas-start"
    tabindex="-1"
    id="profil"
    aria-labelledby="offcanvasStartLabel"
  >
    <div class="offcanvas-header">
      <h5 id="offcanvasStartLabel" class="offcanvas-title"><i class='bx bxs-user-account bx-flip-horizontal bx-tada' ></i> Profil</h5>
      <button
        type="button"
        class="btn-close text-reset"
        data-bs-dismiss="offcanvas"
        aria-label="Close"
      ></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
      <p class="text-center text-white">
        <img src="{{ asset('storage/rsud.png') }}" width="100%"  class="rounded shadow" loading="lazy">
      </p>
      <h6> Rumah Sakit Umum Daerah Sambas </h6>
      <hr class="text-muted">
      <a href="/profil/sejarah" class="btn btn-primary mb-2  w-100" align="left"><i class='bx bx-history bx-tada' ></i> Sejarah </a>
      <a href="/profil/visi-misi" class="text-left btn btn-info mb-2  w-100"><i class='bx bx-message-dots bx-tada' ></i> Visi & Misi </a>
      
    </div>
  </div>
  {{-- End Canvas Profile --}}

 {{-- Canvas Daftar Online --}}
      <div
      class="offcanvas offcanvas-start"
      tabindex="-1"
      id="daftarOnline"
      aria-labelledby="offcanvasStartLabel"
    >
      <div class="offcanvas-header">
        <h5 id="offcanvasStartLabel" class="offcanvas-title"><i class='bx bxs-user-account bx-flip-horizontal bx-tada' ></i> Profil</h5>
        <button
          type="button"
          class="btn-close text-reset"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body my-auto mx-0 flex-grow-0">
        <h6> PENDAFTARAN ONLINE RAWAT JALAN </h6>
        <hr class="text-muted">
        <p> Silahkan pilih Jenis Pendaftaran Online yang kami sediakan : </p>
           <div class="card bg-success">
                <div class="card-header"> Melalui WhatsApp </div>
                <div class="card-body"><a href="https://api.whatsapp.com/send?phone=6282154827357&text=Saya%20ingin%20mendaftar%20online"><img src="{{ asset('assets/img/daftar-online/via-wa.jpg') }}"></a></div> 
              </div>
             <div class="card bg-info">
                <div class="card-header"> Aplikasi RSUD Sambas</div>
                <div class="card-body"><a href="https://play.google.com/store/apps/details?id=com.rsudsambas.co.id"><img src="{{ asset('assets/img/daftar-online/via-rsud.jpg') }}"></a></div> 
              </div>
              <div class="card bg-warning">
                <div class="card-header"> Mobile JKN </div>
                <div class="card-body"><a href="https://play.google.com/store/apps/details?id=app.bpjs.mobile"><img src="{{ asset('assets/img/daftar-online/via-jkn.jpg') }}"></a></div> 
            </div>
      </div>
    </div>
    {{-- End Canvas Daftar Online --}}

    

{{-- Canvas Info Pelayanan --}}
<div
    class="offcanvas offcanvas-start"
    tabindex="-1"
    id="infoPelayanan"
    aria-labelledby="offcanvasStartLabel"
  >
    <div class="offcanvas-header">
      <h5 id="offcanvasStartLabel" class="offcanvas-title"><i class="bx bx-info-circle bx-tada"></i> Informasi Pelayanan</h5>
      <button
        type="button"
        class="btn-close text-reset"
        data-bs-dismiss="offcanvas"
        aria-label="Close"
      ></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
      <a href="/informasi/umum/">
        <div class="card link bt-primary mb-3">
        <div class="card-body">
        <h5 class="card-title mb-2"><i class='bx bx-info-circle'></i> Informasi Umum </h5>
        <small class="card-text text-muted"><i>Maklumat Pelayanan, Tarif, Hak dan Kewajiban Pasien </i></small>
      </div>
      </div>
      </a>
      <a href="/jenis-pelayanan/">
        <div class="card link bt-primary  mb-3">
        <div class="card-body">
        <h5 class="card-title mb-2"><i class='bx bx-info-circle'></i> Jenis Pelayanan </h5>
        <small class="card-text text-muted"><i>IGD, Rawat Jalan, Rawat Inap, Penunjang dan lainnya</i></small>
      </div>
      </div>
      </a>
      
      <a href="/tempat-tidur/">
        <div class="card link bt-primary  mb-3">
        <div class="card-body">
        <h5 class="card-title mb-2"><i class='bx bx-info-circle'></i> Ketersediaan Tempat Tidur </h5>
        <small class="card-text text-muted"><i>Menampilkan list data kamar yang tersedia di RSUD Sambas</i></small>
      </div>
      </div>
      </a>
    </div>
  </div>
  {{-- End Canvas : Info Pelayanan --}}
  
  {{-- Canvas Jadwal Dokter --}}
<div
class="offcanvas offcanvas-start"
tabindex="-1"
id="jadwalDokter"
aria-labelledby="offcanvasStartLabel"
>
<div class="offcanvas-header">
  <h5 id="offcanvasStartLabel" class="offcanvas-title"><i class='bx bx-time bx-tada' ></i> Jadwal Dokter : </h5>
  <button
    type="button"
    class="btn-close text-reset"
    data-bs-dismiss="offcanvas"
    aria-label="Close"
  ></button>
</div>
<div class="offcanvas-body my-auto mx-0 flex-grow-0">
    <div class="card bt-primary shadow">
        <div class="card-body">
            <form id="jadwalForm">
                <div class="mb-3">
                    <label for="tglPeriksa" class="form-label">Tanggal Periksa : </label>
                    <input class="form-control" type="date" value="{{ date('Y-m-d') }}" id="tglPeriksa" required>
                </div>
                <div class="mb-3">
                    <label for="kodePoli" class="form-label">Spesialis / Klinik : </label>
                    <select class="form-select" id="kodePoli" aria-label="kodePoli" required>
                      <option value="" selected="">-- Pilih --</option>
                      @foreach ($poly as $poli)
                        <option value="{{ $poli->kode_bpjs }}">{{ $poli->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="text-center">
                    <button class="btn btn-block btn-primary mb-3" id="cari" name="cari" type="button"> <i class='tf-icons bx bx-search-alt bx-tada' ></i> Lihat Jadwal </button>
                </div>
            </form>
            <div id="loading" style="display: none;" align="center">
                <div class="spinner-grow" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="spinner-grow text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="spinner-grow text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
            </div>
            
            <div id="response" style="display: none;"></div>
        </div>
    </div>
</div>
</div>
{{-- End Canvas : Info Pelayanan --}}

    