<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class DB_GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Gallery';
        $galeries = Galery::latest('created_at')->paginate(5);

        return view('dashboard.galeri.index', compact('title','galeries'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            ]);

        Galery::create($validatedData);

       return redirect('/dashboard/galeri')->with('success', 'New Gallery has been added ! ');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $galeries = Galery::find($id);
        if($galeries)
        {   
            $title = $galeries->name;
            $foto = $galeries->galeri_foto()->paginate(50);
            return view('dashboard.galeri.show', compact('galeries','title', 'foto'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galery $galery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cari = Galery::find($id);
        Galery::destroy($id);
        //dd($cari);
        return redirect('/dashboard/galeri')->with('success', 'Galery has been deleted !');
    }
}
