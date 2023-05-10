<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ //to make sure that we cant create a blank post
            'title'=>'required|max:50',
            'body'=>'required|max:50'
        ]);

        Post::create($request->all());
        return redirect('/posts'); //to go to index
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show a single post
        $post = Post::findOrFail($id);
       return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return "it is working";
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::whereId($id)->delete();
        return redirect('/posts');
    }

























    public function contact()
    {   
        $people = ['Pieter','Jannie','Sannie','Maria','batman'];
        return view('contact', compact('people'));

    }

    public function post_name($id1)
    {
        return view('post_name', compact('id1'));
    }

    public function content($id, $name, $password)
    {
        return view('post_content', compact('id', 'name', 'password'));
    }
}
