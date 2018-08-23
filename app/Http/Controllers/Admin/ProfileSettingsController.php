<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                flashy()->success('Password has been changed successfully!');
                Auth::logout();
                return redirect()->back();
            } else {
                flashy()->error('New Password cannot be the same as old password!');
                return redirect()->back();
            }
        } else {
            flashy()->error('Current password did not match!');
            return redirect()->back();
        }
    }
}
