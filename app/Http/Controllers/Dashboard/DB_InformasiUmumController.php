<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InformasiUmum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DB_InformasiUmumController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Informasi Umum',
            'data' => InformasiUmum::orderBy('id', 'asc')->get()
        ];

        return view('dashboard.informasi-umum.index', $data);
    }

    public function store(Request $request)
    {
        // Validasi input menggunakan request()->validate()
        $request->validate([
            'nama' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048', // Hanya menerima file PDF dengan ukuran maksimal 2MB
        ]);
        // Mengambil data dari input form
        $nama = $request->nama;
        $file = $request->file;

        // Simpan data menggunakan model InformasiUmum
        $informasiUmum = new InformasiUmum();
        $informasiUmum->nama = $nama;

        // Proses upload file jika ada
        if ($file) {
            // Lakukan proses upload file disini
            // Contoh menyimpan file ke direktori public/storage
            $filename = $file->store('file');
            $informasiUmum->file = $filename;
        }

        // Lakukan penyimpanan data ke database
        if ($informasiUmum->save()) {
            // Jika berhasil, kembali ke halaman sebelumnya dengan pesan sukses
            return back()->with('success', 'Data berhasil disimpan.');
        } else {
            // Jika gagal, kembali ke halaman sebelumnya dengan pesan error
            return back()->with('error', 'Data gagal disimpan.');
        }
    }

    public function destroy($id)
    {
        $info = InformasiUmum::findorfail($id);
        if($info->file){
            Storage::delete($info->file);
        }
        InformasiUmum::destroy($info->id);

        return redirect('/dashboard/informasi-umum')->with('success', 'Berhasil di hapus !');
    }
}
