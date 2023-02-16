<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::select('id','username','username_slug','bio')->latest()->take(10)->get();

        $userCount = User::count();

        return view('home', compact('users','userCount'));
    }
}
