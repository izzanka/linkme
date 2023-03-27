<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('appearance');

        $username_slug = $user->username_slug;
        $background_color = $user->appearance->background_color;

        return view('show', compact('username_slug','background_color'));
    }
}
