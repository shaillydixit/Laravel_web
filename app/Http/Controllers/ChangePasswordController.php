<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function ChangePassword(){
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request){
            $validateData= $request->validate([
                'oldpassword' => 'required',
                'password' => 'required|confirmed'
            ]);
            $hashedPassword = Auth::user()->password;
            if(Hash::check($request->oldpassword, $hashedPassword)){
                    $user = User::find(Auth::id());
                    $user->password = Hash::make($request->password);
                    $user->save();

                    Auth::logout();
                    return redirect()->route('login')->with('success', 'password is changed successfully!');
            }else{
                return redirect()->back()->with('error', 'password is invalid');
            }
    }
}
