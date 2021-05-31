<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\DB;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->take(6)->published()->get();
        return view('index', compact('posts'));
    }

    public function posts()
    {
        $posts = Post::latest()->published()->paginate(6);
        $categories = Category::take(10)->get();
        return view('posts', compact('posts', 'categories'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->published()->first();
        $categories = Category::take(10)->get();
        $posts = Post::latest()->take(3)->published()->get();
        return view('post', compact('post', 'categories', 'posts'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function categoryPost($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $posts = $category->posts()->published()->paginate(5);
        debugbar()->info($posts);
        return view('categoryPost', compact('posts', 'categories', 'category'));
    }

    public function search(Request $request)
    {
        $request->validate(['search' => 'required|max:255']);
        $search = $request->search;
        $posts = Post::where('title', 'like', "%$search%")->paginate(6);
        $posts->appends(['search' => $search]);
        return view('search', compact('posts', 'search'));
    }

    public function tagPosts($name)
    {
        // $post_ids = DB::table('tags')->where('name', 'like', "%$name%")->select('postID')->get()->pluck('postID');


        // $tags = Post::whereIn('id', $post_ids)->paginate();
        $query = $name;
        $tags = Tag::where('name', 'like',"%$name%")->paginate(4);
        
        $tags->appends(['search' => $name]);

        return view('tagPost', compact('tags', 'query'));
    }
}
