<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
class LinkController extends Controller
{
    public function index()
    {
        $ctr = 0;
        $views = auth()->user()->views ?? 0;
        $clicks = auth()->user()->links()->sum('clicks') ?? 0;

        if($clicks != 0)
        {
            $rates = $clicks / $views;
            $ctr = $rates * 100;
        }

        return view('user.link.index', compact('views','clicks','ctr'));
    }
}
