<?php

namespace App\Http\Controllers;

use App\Models\InformasiUmum;
use App\Models\KataSambutan;
use App\Models\Post;
use App\Models\ProfilRS;
use App\Models\Service;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class HomeController extends Controller
{
    public function index()
    {
        $latestPost = Post::latest('created_at')->where('published_at','!=','')->first();
        $nextPost = Post::where('created_at', '<', $latestPost->created_at)
            ->where('published_at','!=','')
            ->latest('created_at')
            ->skip(1) // Ganti nilai ini dengan 1 jika Anda ingin mendapatkan post berikutnya
            ->take(5)
            ->get();

        return view('home.home', [
            "title" => "RSUD Sambas",
            "latestPost" => $latestPost,
            "nextPost" => $nextPost,
            "layanan" => Service::orderBy('created_at', 'asc')->get(),
            "katasambutan" => KataSambutan::latest()->first()
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
}