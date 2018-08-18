<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Subscriber;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $posts = Post::all()->count();
        $subscribers = Subscriber::all()->count();

        return view('admin.dashboard', compact('users', 'posts', 'subscribers'));
    }
}
