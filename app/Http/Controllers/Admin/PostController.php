<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts',
            'image' => 'required|mimes:jpg,jpeg,png,bmp',
            'category' => 'required',
            'tag' => 'required',
            'body' => 'required',
        ]);

        //Image Upload
        $image = $request->image;
        $slug = Str::slug($request->title, '-');
        $imageName = $slug . '-' . uniqid() . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();

        if (!Storage::disk('public')->exists('post')) {
            Storage::disk('public')->makeDirectory('post');
        }

        // Image Crop
        $img = Image::make($image)->resize(752, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->stream();

            Storage::disk('public')->put('post/' . $imageName, $img);

        $post = new Post();
        $post->title = $request->title;
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if(isset($request->status)){
            $post->status = 1;
        }
        $post->save();
        Toastr::success('Post created successfully!');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post','categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts',
            'image' => 'sometimes|mimes:jpg,jpeg,png,bmp|max:5000',
            'category' => 'required',
            'tag' => 'required',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $slug = Str::slug($request->title, '-');
        
        if(isset($request->image)){
            $image = $request->image;
            $imageName = $slug . '-' . uniqid() . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();

            // if Post directory image is exists.
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }

            //Delete old image
            if (!Storage::disk('public')->exists('post/', $post->image)) {
                Storage::disk('public')->delete('post/', $post->image);
            }

            $postImage = Image::make($image)->resize(752, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->stream();

            Storage::disk('public')->put('post/' . $imageName, $postImage);
        }else{
            $request->image = $post->image;
        }
        
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->save();
        Toastr::success('Post Updated successfully!');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!Storage::disk('public')->exists('post', $post->image)) {
            Storage::disk('public')->delete('post', $post->image);
        }
        $post->delete();
        Toastr::success('Post Deleted successfully!');
        return redirect()->route('admin.post.index');
    }
}
