<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load(['links' => fn($query) => $query->where('active', true),'appearance']);
        return view('show', compact('user'));
    }
}
