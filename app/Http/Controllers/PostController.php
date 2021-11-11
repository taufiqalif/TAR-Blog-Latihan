<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Models\Post as ModelsPost;

class PostController extends Controller
{
    public function index()
    {   

        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('user')){
            $user = User::firstWhere('username', request('user'));
            $title = ' By ' . $user->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'blog',
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            "title" => "single post",
            "active" => 'blog',
            "post" => $post
        ]);
    }
}