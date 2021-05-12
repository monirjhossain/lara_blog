<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $posts = Post::latest()->take(6)->published()->get();
        return view('index', compact('posts'));
    }

    public function posts(){
        $posts = Post::latest()->published()->paginate(6);
        $categories = Category::take(10)->get();
        return view('posts', compact('posts', 'categories'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->published()->first();
        $categories = Category::take(10)->get();
        $posts = Post::latest()->take(3)->published()->get();
        return view('post', compact('post','categories','posts'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function categoryPost($slug){
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $posts = $category->posts()->published()->paginate(5);
        debugbar()->info($posts);
        return view('categoryPost', compact('posts', 'categories','category', 'latestPosts'));
    }


    
}
