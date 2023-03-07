<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
class LinkController extends Controller
{
    public function index()
    {
        $views = auth()->user()->views;
        $clicks = auth()->user()->links()->sum('clicks');
        $rates = $clicks / $views;
        $ctr = $rates * 100;

        return view('user.link.index', compact('views','clicks','ctr'));
    }
}
