<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        if(!Auth::check()){
            $users = User::select('id','username','username_slug','credential')->latest()->take(6)->get();
        }

        $users = User::select('id','username','username_slug','credential')->whereNot('id', auth()->id())->take(6)->latest()->get();
        $userCount = User::count();

        return view('home', compact('users','userCount'));
    }
}
