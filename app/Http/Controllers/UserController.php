<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show($username_slug)
    {
        return view('show', compact('username_slug'));
    }
}
