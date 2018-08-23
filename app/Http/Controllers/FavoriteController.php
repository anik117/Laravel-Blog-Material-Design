<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addFavorite($post)
    {
        $user = Auth::user();
        $isFavorite = $user->favoritePosts()->where('post_id', $post)->count();

        if ($isFavorite == 0) {
            $user->favoritePosts()->attach($post);
            flashy()->success('Added to the favorite list!');
            return redirect()->back();
        } else {
            $user->favoritePosts()->detach($post);
            flashy()->success('Removed from the favorite list!');
            return redirect()->back();
        }
    }
}
