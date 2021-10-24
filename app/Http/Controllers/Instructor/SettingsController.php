<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Session;

class SettingsController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        return response()->view('instructor.settings.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name'      => 'required|min:3',
            'last_name'       => 'required|min:3',
            'contact_address' => 'required|min:5',
            'gender'          => 'required',
            'age'             => 'required|numeric',
            'avatar'          => 'mimes:jpg,png,gif|max:2048',
        ]);

        $user    = Auth::user();
        $profile = Auth::user()->instructor();


        /*
         * if user set a picture upload it
         * if not the current avatar path is used
         * */
        $avatar = $user->profile_photo_path;
        if ($request->hasFile('avatar')) {
            $fileName = time().'.'.$request->file('avatar')->extension();
            $request->file('avatar')->move(public_path('images/avatar'), $fileName);
            $avatar = $fileName;
        }

        $user->update([
            'profile_photo_path' => $avatar
        ]);

        $profile->update([
            'first_name'      => $request->input('first_name'),
            'last_name'       => $request->input('last_name'),
            'contact_address' => $request->input('contact_address'),
            'gender'          => $request->input('gender'),
            'age'             => $request->input('age'),
        ]);

        Session::flash('flash_success', 'Profile successfully updated!');

        return redirect()->route('instructor.profile');
    }

    /*
     * change password view
     * */
    public function changePassword()
    {
        return response()->view('instructor.settings.change-password');
    }

    /*
     * update password
     * */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'      => 'required',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        if (Hash::check($request->input('current_password'), Auth::user()->password)) {
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->input('password'))]);
            Session::flash('flash_success', 'Password updated!');
        } else {
            Session::flash('flash_error', 'Your current password does not matches with the password you provided. Please try again.');
        }

        return redirect()->route('instructor.change-password');
    }
}
