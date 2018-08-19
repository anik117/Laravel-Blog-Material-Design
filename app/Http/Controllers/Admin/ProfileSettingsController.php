<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileSettingsController extends Controller
{
    public function index()
    {
        return view('admin.profile.settings');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required|image',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);

        $user = User::findOrFail(Auth::id());

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

//            check category if exists
            if (!Storage::disk('public')->exists('profile')){
                Storage::disk('public')->makeDirectory('profile');
            }

//            delete old image
            if (Storage::disk('public')->exists('profile/'.$user->image)){
                Storage::disk('public')->delete('profile/'.$user->image);
            }

            $profileimage = Image::make($image)->stream();
            Storage::disk('public')->put('profile/'.$imagename, $profileimage);
        } else {
            $imagename = $user->image;
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->about = $request->about;
        $user->image = $imagename;

        $user->save();

        flashy()->success('Profile updated successfully');
        return redirect()->back();
    }
}
