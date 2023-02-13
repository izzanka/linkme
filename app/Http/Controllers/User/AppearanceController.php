<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appearance;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    public function index()
    {
        $appearance = Appearance::where('user_id', auth()->id())->first();
        return view('user.appearance.index', compact('appearance'));
    }


}
