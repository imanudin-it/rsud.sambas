<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Service;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DashboardServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.services.index',[
            'title' => 'Services',
            'data' => Service::orderBy('name','ASC')->paginate('10')
        ]);
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
        $valiasi = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'slug' => 'required|unique:services',
            'description' => 'required'
        ]);

        if($request->file('image')){
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath =  $file->storeAs('service-images', $fileName,'public'); // Store the file in the storage/uploads directory
            $validasi['image'] = $filePath;
        }

       Service::create($valiasi);

        return redirect('/dashboard/services')->with('success', 'New Service has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
       return view('dashboard.services.details',[
        'title' => $service->name,
        'service' => $service,
        'data' => $service->service_details,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //dd($service);
        return view('dashboard.services.edit',[
            'title' => 'Edit Services',
            'services' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'description' => 'required'
        ];
       
        if($request->slug != $service->slug){
            $rules['slug']  =  'required|unique:posts';
        }
        $validatedData = $request->validate($rules);
        
        if($request->file('image')){
            if($service->image){
                Storage::delete($service->image);
            }
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath =  $file->storeAs('service-images', $fileName,'public'); // Store the file in the storage/uploads directory
            $validatedData['image'] = $filePath;
        }

        Service::where('id', $service->id)
            ->update($validatedData);

        return redirect('/dashboard/services')->with('success', 'Service has been Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if($service->image){
            Storage::delete($service->image);
        }
        Service::destroy($service->id);

        return redirect('/dashboard/services')->with('success', 'Berhasil di hapus !');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Service::class,'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function checkData(Request $request)
    {
        $data = Service::find($request->id);
        return response()->json([
            'slug' => $data->slug,
            'name' => $data->name,
            'imagePreview' => $data->image,
            'description'=> $data->description]);
    }
}
