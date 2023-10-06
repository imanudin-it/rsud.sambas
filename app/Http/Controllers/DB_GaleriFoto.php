<?php

namespace App\Http\Controllers;


use App\Models\Galery;
use App\Models\GaleryFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DB_GaleriFoto extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // Simpan data request ke dalam variabel (sebelum validasi)
            $requestData = $request->all();

            // Menentukan aturan validasi
            $rules = [
                'galery_id' => 'required',
                'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];

            // Membuat instance Validator
            $validator = Validator::make($requestData, $rules);

            // Memeriksa apakah validasi gagal
            if ($validator->fails()) {
                // Mengembalikan data request yang telah disimpan sebelum validasi
                return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
                }
        
        $failedUploads = [];
    
        foreach ($request->file('foto') as $file) {
            if ($file->isValid()) {
                $imageName = time() . '_' . $file->getClientOriginalName(); // Generate nama unik untuk gambar
                
                // Simpan gambar ke direktori penyimpanan yang sesuai
                $path = $file->storeAs(
                    'galeri',
                    $imageName,
                    'public' // Atur visibilitas file menjadi public
                );
    
                // Simpan data foto ke database
                $photo = new GaleryFoto();
                $photo->name = $imageName;
                $photo->galery_id = $request->galery_id;
                $photo->image_path = $path; // Gunakan path penyimpanan yang sesuai
                $photo->save();
            } else {
                // Jika terjadi kegagalan unggah, tambahkan nama file ke daftar yang gagal
                $failedUploads[] = $file->getClientOriginalName();
            }
        }
    
        if (count($failedUploads) > 0) {
            // Jika ada file yang gagal diunggah, tampilkan pesan kesalahan
            return redirect()->back()->with('error', 'Gagal mengunggah berikut ini: ' . implode(', ', $failedUploads));
        } else {
            return redirect()->back()->with('success', 'Foto berhasil diunggah.');
        }
    }

   
    public function destroy(Request $request, $id)
    {
        // Temukan entri foto berdasarkan ID
        $photo = GaleryFoto::findOrFail($id);

        // Hapus file dari penyimpanan
        if (Storage::exists($photo->image_path)) {
            Storage::delete($photo->image_path);
        }

        // Hapus data dari database
        $photo->delete();

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }
}
