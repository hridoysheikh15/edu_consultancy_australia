<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    public function imageUpdate(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        if($request->hasFile('image')){
            $user = Auth::user();
            $path = $this->uploadImage($request, 'image', 'backend/images/users');
            //delete old image
            if($user->image && file_exists(public_path($user->image))){
                unlink(public_path($user->image));
            }
            $user->image = $path;
            $user->save();
        }
        return Redirect::back()->with('success', 'Profule image updated successfully');
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $request->validate([
                'password' => 'min:8',
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

}
