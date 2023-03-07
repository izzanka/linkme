<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $username_slug = $user->username_slug;
        return view('show', compact('username_slug'));
    }
}
