<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function index()
    {
        $links = Auth::user()->links()
            ->withCount('visits')
            ->with('latest_visit')
            ->get();
        return view('links.index',compact('links'));
    }

    public function create()
    {
        $checkLink = Link::where('user_id',auth()->id())->count();
        if($checkLink >= 5){
            return redirect()->to('/dashboard/links');
        }
        return view('links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:225',
            'link' => 'required|url'
        ]);

        $checkLink = Link::where('user_id',auth()->id())->count();

        if($checkLink >= 5){
            return redirect()->to('/dashboard/links');
        }

        $link = Auth::user()->links()->create([
            'name' => ucfirst($request->name),
            'link' => $request->link
        ]);

        if($link){
            return redirect()->to('/dashboard/links')->with(['success' => 'Link was created successfully']);
        }else{
            return redirect()->to('/dashboard/links');
        }
    }

    public function edit(Link $link)
    {
        if($link->user_id != Auth::id()){
            return abort(404);
        }

        return view('links.edit',compact('link'));
    }

    public function update(Request $request, Link $link)
    {
        if($link->user_id != Auth::id()){
            return abort(404);
        }
        
        $request->validate([
            'name' => 'required|max:225',
            'link' => 'required|url'
        ]);

        $link->update($request->only(['name','link']));
   
        return redirect()->to('/dashboard/links')->with(['success' => 'Link was updated successfully']);
    }

    public function destroy(Link $link)
    {
        if($link->user_id != Auth::id()){
            return abort(404);
        }

        $link->delete();

        return redirect()->to('/dashboard/links')->with(['success' => 'Link was deleted successfully']);
    }
}
