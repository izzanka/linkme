<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home');
    }

    public function search(Request $request){

        $users = [];

        if($request->has('q')){
            $search = $request->q;
            $users = User::select('id','username','username_slug')->with('links')->where('username','like',"%$search%")->whereHas('links')->get();
        }

        return response()->json($users);
    }

}
