<?php

use App\Http\Controllers\Dashboard\DashboardCategoryController;
use App\Http\Controllers\Dashboard\DashboardPostController;
use App\Http\Controllers\Dashboard\DashboardServiceController;
use App\Http\Controllers\Dashboard\DB_InformasiUmumController;
use App\Http\Controllers\Dashboard\KataSambutanController;
use App\Http\Controllers\Dashboard\ProfilRSController;
use App\Http\Controllers\Dashboard\ServiceDetailsController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/jenis-pelayanan', [HomeController::class, 'jenis_pelayanan']);
Route::get('/jenis-pelayanan/{slug}', [HomeController::class, 'jenis_pelayanan_details']);
Route::get('/kata-sambutan', [HomeController::class, 'kata_sambutan']);

Route::get('/posts/', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories/{category:slug}', function(Category $category){
    return view('home.posts',[
        'title' => "Kategori $category->name",
        'posts' => $category->posts()->latest('published_at')->paginate(5),
        'category' => $category->name,
        'categories' => Category::all()
    ]);
});

Route::get('/authors/{author:username}', function(User $author){
    return view('home.posts', [
            'title' => "Author $author->name",
            'posts' => $author->posts()->paginate(5),
            'categories' => Category::all()    
        ]);
});

Route::get('/register/', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register/', [RegisterController::class, 'store']);

Route::get('/login/', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login/', [LoginController::class, 'authenticate']);
Route::post('/logout/', [LoginController::class, 'logout']);

Route::get('/profil/{kat}', [HomeController::class, 'profil']);
Route::get('/informasi/umum/', [HomeController::class,'informasi_umum']) ; 

Route::group(['middleware' => ['auth']], function () 
{
    Route::get('/dashboard/', function(){
        return view('dashboard.index',[
            'title' => 'Dahsboard'
        ]);
    });

    Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class, 'checkSlug']);
    Route::get('/dashboard/posts/draft',[DashboardPostController::class, 'draft']);
    
    Route::resource('/dashboard/posts', DashboardPostController::class);

    Route::get('/dashboard/categories/checkSlug',[DashboardCategoryController::class, 'checkSlug']);
    Route::resource('/dashboard/categories', DashboardCategoryController::class);

    Route::get('/dashboard/services/checkSlug',[DashboardServiceController::class, 'checkSlug']);
    Route::get('/dashboard/services/checkData',[DashboardServiceController::class, 'checkData']);
    Route::resource('/dashboard/services/details', ServiceDetailsController::class);
    Route::resource('/dashboard/services', DashboardServiceController::class);
    Route::resource('/dashboard/kata-sambutan', KataSambutanController::class);
    
    Route::get('/dashboard/profil/{kat}', [ProfilRSController::class, 'index']);
    Route::put('/dashboard/profil/{kat}/{id}', [ProfilRSController::class, 'update']);

    Route::get('/dashboard/informasi-umum', [DB_InformasiUmumController::class, 'index']);
    Route::post('/dashboard/informasi-umum', [DB_InformasiUmumController::class, 'store']);
    Route::delete('/dashboard/informasi-umum/{id}', [DB_InformasiUmumController::class, 'destroy']);
    
}); //route middleware auth