<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\ProfilRS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = array(
        'title' => 'Profil Umum',
        'data' => ProfilRS::latest()->first()
        );

        $kat = request('kat');

        switch ($kat) {
            case 'sejarah':
                return view('dashboard.profil.sejarah', $data);
            case 'umum':
                return view('dashboard.profil.index', $data);
            default:
            // Add a default case to handle other values of 'kat'
            // You may return a view for an error page or redirect to another page.
            break;
    }
    }

    
    public function update(Request $request, $kat,$id)
    {
        $profil = ProfilRS::findorfail($id);
       switch($kat)
       {
            case 'umum' :
                if($request->struktur)
                {
                    $rules = [
                        'struktur' => 'image|file|max:1024',
                       ];
                       //return dd($request);
                }else{
                    $rules = [
                        'visi' => 'required',
                        'misi' => 'required',
                        'moto' => 'required'
                    ];
                }
                
                $validatedData = $request->validate($rules);
                if($request->file('struktur')){
                    if($profil->struktur){
                        Storage::delete($profil->struktur);
                    }
                    $validatedData['struktur'] = $request->file('struktur')->store('struktur-images');
                }
                break;
            
            case 'sejarah'  :

                $rules = [
                    'sejarah' => 'required',
                    'image' => 'image|file|max:1024',
                ];
                $validatedData = $request->validate($rules);
                if($request->file('image')){
                    if($profil->image){
                        Storage::delete($profil->image);
                    }
                    $validatedData['image'] = $request->file('image')->store('profil-images');
                }
                break;
       }
       $update = ProfilRS::where('id', $id)
            ->update($validatedData);
       if($update){
        return redirect()->back()->with('success', 'Perubahan profile '.$kat.' berhasil disimpan ! ');
       }else{
        return redirect()->back()->with('error', 'Perubahan profile '.$kat.' Gagal ! ');
       
       }
    }

   
}
