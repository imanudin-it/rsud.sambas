<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\InformasiUmum;
use App\Models\KataSambutan;
use App\Models\Poliklinik;
use App\Models\Post;
use App\Models\ProfilRS;
use App\Models\Service;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\File;
class HomeController extends Controller
{
    public function index()
    {
        $latestPost = Post::latest('created_at')
                  ->whereNotNull('published_at')
                  ->first();
        $nextPost = Post::whereNotNull('published_at')
            ->latest('created_at')
            ->skip(1) // Ganti nilai ini dengan 1 jika Anda ingin mendapatkan post berikutnya
            ->take(4)
            ->get();

        // Path to the images directory
        $path = storage_path('app\public\slide-header');

        // Get all files from the directory
        $files = File::files($path);

        // Extract file names
        $fileNames = array_map(function($file) {
            return $file->getFilename();
        }, $files);

        $slide_header = $fileNames;
        //dd($latestPost);
        return view('home.home', [
            "title" => "Beranda",
            "latestPost" => $latestPost,
            "nextPost" => $nextPost,
            "layanan" => Service::orderBy('created_at', 'asc')->get(),
            "dokters" => Dokter::orderBy('NAMADOKTER', 'asc')->get(),
            "katasambutan" => KataSambutan::latest()->first(),
            "slide_header" => $slide_header,
            // "poly" => Poliklinik::where('kode_bpjs', '!=', '')
            //         ->where('status','=','0')
            //         ->whereNotIn('kode',[42,44])
            //         ->orderby('nama', 'ASC')->get()
        ]);
    }

    public function jenis_pelayanan()
    {
        return view('home.jenis-pelayanan',[
            'title' => 'Jenis Pelayanan',
            'data' => Service::orderBy('created_at', 'asc')->paginate(50)
        ]);
    }

    public function jenis_pelayanan_details($slug)
    {
        $pelayanan = Service::where('slug', $slug)->first();
        
        return view('home.jenis-pelayanan-details',[
            'title' => $pelayanan->name,
            'data' => $pelayanan,
            'subdata' => $pelayanan->service_details,
            'layanan' => Service::orderBy('name', 'asc')->take(5)->get(),
            
        ]);
    }

    public function kata_sambutan()
    {
        return view('home.kata-sambutan', [
            "title" => "Kata Sambutan",
            "data" => KataSambutan::latest()->first(),
            "posts" => Post::latest()->where('published_at','!=','')->take(8)->get(),
            
        ]);
    }

    public function profil()
    {
        $data = [
            "data" => ProfilRS::latest()->first(),
            "posts" => Post::latest()->where('published_at','!=','')->take(8)->get(), 
        ];
        if(request('kat')=='sejarah')
        {
            $data['title'] = 'Sejarah';
        }else{
            $data['title'] = 'Visi Misi';
        }

        return view('home.profil', $data);
    }

    
    public function informasi_umum()
    {
        $data = [
        'title' => 'Informasi Umum',
        'data' => InformasiUmum::orderBy('id', 'ASC')->get(),
        'posts' => Post::latest()->where('published_at','!=','')->take(8)->get(),
     ];
     return view('home.informasi.umum',$data);
    }

    public function jadwal_dokter($kodePoli, $tglPeriksa)
    {
        $json = file_get_contents("https://antrian.server-rsudsambas.com:8011/?link=bpjs-referensiJadwalDokter&kodepoli=$kodePoli&tanggalperiksa=$tglPeriksa");
        return $json;
    }

    public function list_kamar()
    {
        $json = json_decode(file_get_contents("http://36.91.145.69/bridging/applicares/?link=list-kamar"));
        $data = [
            'title' => 'Ketersediaan Tempat Tidur',
            'data' => $json->response->list,
         ];
         return view('home.informasi.tempat_tidur',$data);
    }
}