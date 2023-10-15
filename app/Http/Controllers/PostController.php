<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        $posts = Post::where('published_at','!=','NULL')->latest('created_at');
        $title = 'Semua Post';
        if(request('search')){
            $posts = Post::where('title','like', '%'.request('search').'%')
                    ->orWhere('body','like', '%'.request('search').'%')->latest('created_at');
            $title = 'Hasil Pencarian';
        }
        return view('home.posts', [
            'title' => $title,
            "posts" => $posts->paginate(5),
            "categories" => Category::all()
        ]);
    }

    
    public function show(Post $post)
    {
        //$single = Post::find($post->id);
        $article = $post->load('author', 'category', 'gallery');

        $relatedArticles = $article->category->posts()->where('category_id', '=', $article->category_id)->latest()->take(5)->get();
        $title = $post->title;
        $categories = Category::all();
        $post->incrementReadCount();
       
        return view('home.post', compact('post','relatedArticles', 'title', 'categories' ));
    }

    
    
}
