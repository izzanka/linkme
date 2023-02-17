<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('links','appearance');
        return view('show', compact('user'));
    }
}
