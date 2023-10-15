<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Galery;
use App\Models\Post;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('admin')) // jika Admin
        {
            $post = Post::latest()->where('published_at', '!=', null);
        } else if (Gate::allows('member')) // jika Member
             {
                $post = Post::latest()->where('user_id', auth()->user()->id)->where('published_at', '!=', !null);
                } else {
            $post = 0; // Atur default draft ke 0 jika bukan Admin atau Member
        }
        
        if(request('cari')){
            $post->where('title','like', '%'.request('search').'%')
            ->orWhere('body','like', '%'.request('search').'%')->latest('published_at');
        }

        return view('dashboard.posts.index',[
            'title' => 'Posts',
            'posts' => $post->paginate(10)
        ]);
    }

    public function draft()
    {
        $title = 'Posts';
        if (Gate::allows('admin')) // jika Admin
        {
            $post = Post::latest()->where('published_at', null);
        } else if (Gate::allows('member')) // jika Member
             {
                $post = Post::latest()->where('user_id', auth()->user()->id)->where('published_at', null);
                } else {
            $post = 0; // Atur default draft ke 0 jika bukan Admin atau Member
        }
        
        return view('dashboard.posts.index',[
            'title' => 'Posts',
            'posts' => $post->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'title' => 'New Post',
            'categories' => Category::all(),
            'albums' => Galery::latest('created_at')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' =>  'required|max:255',
            'slug'  =>  'required|unique:posts',
            'category_id'   =>  'required',
            'galery_id'   =>  '',
            'body'  =>  'required',
            'foto' => 'image|file|max:1024'
        ]);
        if($request->publish == '1'){
            $validatedData['published_at'] = Carbon::now()->toDateTimeString();
        }
        if($request->file('image')){
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath =  $file->storeAs('post-images', $fileName,'public'); // Store the file in the storage/uploads directory
            $validatedData['foto'] = $filePath;
        }

        $validatedData['user_id'] = auth()->user()->id;
        
        POST::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show',[
            'title' => $post->title,
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit',[
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => Category::all(),
            'albums' => Galery::latest('created_at')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' =>  'required|max:255',
            'category_id'   =>  'required',
            'body'  =>  'required',
            'foto' => 'image|file|max:1024',
            'galery_id' => ''
        ];
       
        if($request->slug != $post->slug){
            $rules['slug']  =  'required|unique:posts';
        }
        $validatedData = $request->validate($rules);
        
        if($request->publish == '1'){
            $validatedData['published_at'] = Carbon::now()->toDateTimeString();
        }else {  $validatedData['published_at'] = null; }

        if($request->file('image')){
            if($post->foto){
                Storage::delete($post->foto);
            }
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath =  $file->storeAs('post-images', $fileName,'public'); // Store the file in the storage/uploads directory
            $validatedData['foto'] = $filePath;
        }

        $validatedData['user_id'] = auth()->user()->id;
        
        POST::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->foto){
            Storage::delete($post->foto);
        }
        POST::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted !');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class,'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
