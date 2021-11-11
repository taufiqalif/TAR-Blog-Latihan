<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        "active" => "home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Taufiq Alif Rahman",
        "email" => "taufiqalif4@gmai.com",
        "image" => "taufiq.png"
    ]);
});


Route::get('/blog', [PostController::class, 'index']);

// halaman post

Route::get('/posts/{post:slug}', [PostController::class, 'show']);


Route::get('/categories', function(){
    return view('categories',[
        'title' => 'Post Category',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('user/{user:username}', function (User $user) {
    return view('posts',[
        'title' => "Post By Author",
        'posts' => $user->posts
    ]);
});

// login
Route::get('/login',[loginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login',[loginController::class, 'authenticate']);
Route::post('/logout',[loginController::class, 'logout']);

// register
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');

Route::post('/register',[RegisterController::class, 'store']);


// dashboard

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::get('/dashboard/categories/checkSlug',[AdminCategoryController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_admin');