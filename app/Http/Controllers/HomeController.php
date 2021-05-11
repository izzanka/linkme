<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->search){
            $user = User::where('username','like','%' . $request->search . '%')->first();
            if($user){
                return view('users.show',compact('user'));
            }else{
                return back()->with('error','Username not found');
            }
        }else{
            return view('home');
        }
    }

}
