<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->search){

            $request->validate([
                'search' => 'required|alpha|max:30'
            ]);

            $user = User::with('links')->where('username','like','%' . $request->search . '%')->whereHas('links')->first();
            
            if($user){
                return view('users.show',compact('user'));
            }else{
                return back()->with(['not-found' => "Username not found or doesn't have any links!"]);
            }

        }else{
            return view('home');
        }
    }

}
