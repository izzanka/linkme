<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Auth::user()->links()
            ->withCount('visits')
            ->with('latest_visit')
            ->get();
        return view('links.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:225',
            'link' => 'required|url'
        ]);

        $link = Auth::user()->links()->create($request->only(['name','link']));
        if($link){
            return redirect()->to('/dashboard/links')->with(['success' => 'Link was created successfully']);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        if($link->user_id != Auth::id()){
            return abort(404);
        }

        return view('links.edit',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        if($link->user_id != Auth::id()){
            return abort(404);
        }

        $link->delete();

        return redirect()->to('/dashboard/links');
    }
}
