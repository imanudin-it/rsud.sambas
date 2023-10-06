<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ServiceDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ServiceDetails $serviceDetails)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'image' => 'image|file|max:1024',
                'service_id' => 'required',
                'descriptions' => 'required'
            ]);
        
            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath =  $file->storeAs('service-images', $fileName,'public'); // Store the file in the storage/uploads directory
                $validatedData['image'] = $filePath;
            }
        
           ServiceDetails::create($validatedData);
        
            return redirect()->back()
                ->with('success', 'New Service Details has been added.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error adding Service Details: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = ServiceDetails::findorfail($id);

        return view('dashboard.services.details.edit',[
            'title' => 'Edit '.$data->name,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $serviceDetails = serviceDetails::findorFail($id);
        //dd($serviceDetails);
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'descriptions' => 'required'
        ];
       
        
        $validatedData = $request->validate($rules);
        
        if($request->file('image')){
            if($serviceDetails->image){
                Storage::delete($serviceDetails->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        ServiceDetails::where('id', $serviceDetails->id)
            ->update($validatedData);

        return redirect()->back()->with('success', 'Service has been Updated !');
        // return redirect('/dashboard/services')->with('success', 'Service has been Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $serviceDetails = serviceDetails::findorFail($id);
        
        if($serviceDetails->image){
            Storage::delete($serviceDetails->image);
        }
        ServiceDetails::destroy($serviceDetails->id);

        // return redirect('/dashboard/services/')->with('success', 'Berhasil di hapus !');
    }
}
