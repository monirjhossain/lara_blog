<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class dashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function showProfile(){
        $user = User::find(Auth::user()->id);
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request){
        // return $request;
        $request->validate([
            'name' => 'required',
            'user_id' => 'required|unique:users',
            'about' => 'sometimes|max:255',
            'image' => 'sometimes|image|mimes:jpg,png,bmp,jpeg|max:20000'
        ]);

        $userupdate = User::find(Auth::user()->id);
        $userupdate->user_id = $request->input('user_id');
        $userupdate->name = $request->input('name');
        $userupdate->about = $request->input('about');
        $userupdate->image = $request->input('image');

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $image = time() . '.' . $extention;
            $file->move('storage/user', $image);
            $userupdate->image = $image;
        }
        $userupdate->Save();
        Toastr::success('details Updated successfully!', 'success');
        return redirect()->back();
    }

    public function changePassword(Request $request){
        // return $request;
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|max:255|confirmed'
        ]);

        //Cross check the password
        $old_pass = Auth::user()->password; //Hashed
        if(Hash::check($request->old_password, $old_pass)){
            //Old password should not be same as new password!
            if(!Hash::check($request->password, $old_pass)){
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
    
            //Logout
            Auth::logout();
            return redirect()->back();
            }else{
                Toastr::error('Old password should not be same as new password!');
                return redirect()->back();
            }

        }else{
            Toastr::error('Enter the correct old password :');
            return redirect()->back();
        }
    }
}
