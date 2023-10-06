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
            
            $file = $request->file;
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath =  $file->storeAs('file', $fileName,'public'); // Store the file in the storage/uploads directory
                
            $informasiUmum->file = $filePath;
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
        try {
            $info = InformasiUmum::findOrFail($id);
            
            if($info->file){
                Storage::delete('public/'.$info->file);
            }
            
            $info->delete();
            
            return redirect()->route('/dashboard/informasi-umum')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('/dashboard/informasi-umum')->with('error', 'Data not found or could not be deleted.');
        }
    }
}
