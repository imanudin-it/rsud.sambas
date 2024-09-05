<?php

namespace App\Http\Controllers;

use App\Models\StandarPelayanan;
use Illuminate\Http\Request;

class InformasiUmumController extends Controller
{
    public function standar_pelayanan()
    {
        $standar_pelayanan = StandarPelayanan::orderBy('id', 'asc')->get();
        //dd($standar_pelayanan);
        return view('home.informasi.standar-pelayanan', [
            'title' => 'Standar Pelayanan RSUD Sambas',
            'standar_pelayanan' => $standar_pelayanan,
        ]);
    }
}
