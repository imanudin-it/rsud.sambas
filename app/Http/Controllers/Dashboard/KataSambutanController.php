<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KataSambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KataSambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kata-sambutan.index',[
            'title' => 'Kata Sambutan',
            'data' => KataSambutan::latest()->first()
        ]);
    }

    
    
    public function update(Request $request, $id)
    {
        $kataSambutan = kataSambutan::findorFail($id);
        //dd($serviceDetails);
        $rules = [
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'isi' => 'required'
        ];
       
        
        $validatedData = $request->validate($rules);
        
        if($request->file('image')){
            if($kataSambutan->image){
                Storage::delete($kataSambutan->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        kataSambutan::where('id', $kataSambutan->id)
            ->update($validatedData);

        return redirect()->back()->with('success', 'Kata Sambutan berhasil disimpan ! ');
    }

    
}
