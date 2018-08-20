<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::where('is_approved', '1')
                    ->where('status', '1')
                    ->latest()->take(6)->get();
        $admins = User::where('id', '1')->get();
        $authors = User::where('id', '2')->get();
        return view('home', compact('categories', 'posts', 'admins', 'authors'));
    }
}
