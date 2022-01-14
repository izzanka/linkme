<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function show(User $user){
        $user->load('links');
        return view('users.show',compact('user'));
    }
    
    public function edit()
    {
        $user = Auth::user();
        return view('users.edit',compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'background_color' => 'required|size:7|starts_with:#',
            'text_color' => 'required|size:7|starts_with:#'
        ]);

        Auth::user()->update($request->only(['background_color','text_color']));
        return back()->with(['success' => 'Settings was updated successfully']);
    }

    public function update_profile(Request $request,$id)
    {
        $request->validate([
            'username' => 'required|unique:users,username,'.$id,
            'image' => 'image|mimes:jpeg,jpg,png,svg|max:2048'
        ]);

        $username = ucwords($request->username);

        if($request->hasFile('image')){

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move('img/',$imageName);

            Auth::user()->update([
                'username' => $username,
                'image' => $imageName
            ]);

        }else{

            Auth::user()->update(
                ['username' => $username]
            );

        }

        return back()->with(['updated_profile' => 'Profile was updated successfully']);

    }

    public function password_update(Request $request){

        $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);
        
        Auth::user()->update(['password' => Hash::make($request->password)]);

        return back()->with(['updated_password' => 'Password was updated successfully']);
    }

}
