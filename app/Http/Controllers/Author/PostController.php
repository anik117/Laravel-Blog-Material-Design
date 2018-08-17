<?php

namespace App\Http\Controllers\Author;

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use MercurySeries\Flashy\Flashy;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->latest()->get();
        return view('author.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('author.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
//            make unique img name
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

//            check category if exists
            if (!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }

//            resize image for category
            $postimage = Image::make($image)->resize(1600,1066)->stream();
            Storage::disk('public')->put('post/'.$imagename,$postimage);

        } else {
            $imagename = 'default.png';
        }

        $post = new Post();

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->body = $request->body;

        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }

        $post->is_approved = false;

        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        flashy()->success('Post Created Successfully!');
        return redirect()->route('author.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            flashy()->error('You are not authorized to access this post!');
            return redirect()->back();
        }
        return view('author.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            flashy()->error('You are not authorized to access this post!');
            return redirect()->back();
        }

        $categories = Category::all();
        $tags = Tag::all();
        return view('author.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id != Auth::id()) {
            flashy()->error('You are not authorized to access this post!');
            return redirect()->back();
        }

        $this->validate($request, [
            'title' => 'required',
            'image' => 'image',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
//            make unique img name
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

//            check category if exists
            if (!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }

//            delete old image
            if (Storage::disk('public')->exists('post/'.$post->image)){
                Storage::disk('public')->delete('post/'.$post->image);
            }

//            resize image for category
            $postimage = Image::make($image)->resize(1600,1066)->stream();
            Storage::disk('public')->put('post/'.$imagename,$postimage);

        } else {
            $imagename = $post->image;
        }

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->body = $request->body;

        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = false;

        $post->save();

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        flashy()->success('Post Updated Successfully!');
        return redirect()->route('author.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            flashy()->error('You are not authorized to access this post!');
            return redirect()->back();
        }

        if (Storage::disk('public')->exists('post/'.$post->image)){
            Storage::disk('public')->delete('post/'.$post->image);
        }

        $post->categories()->detach();
        $post->tags()->detach();

        $post->delete();

        flashy()->success('Post Deleted Successfully!');
        return redirect()->back();
    }
}
