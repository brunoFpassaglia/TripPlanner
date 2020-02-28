<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Trip;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Trip $trip)
    {
        //
        $posts = Trip::find($trip->id)->posts;
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StorePostRequest $request, Trip $trip)
    {
        
        //
        $data = $request->validated();
        auth()->user()->posts()->create([
            'title'=>$data['title'],
            'content'=>$data['content'],
            'trip_id'=>$trip->id,
            ]
        );
        
        return redirect(route('trips.show', $trip));
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function show(Trip $trip, Post $post)
    {
        //
        return view('trips.posts.show', ['post'=>$post]);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function edit(Post $post)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Post $post)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function destroy(Post $post)
    {
        //
    }
}
