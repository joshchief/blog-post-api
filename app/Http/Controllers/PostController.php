<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all posts
        $post = Post::all();
        return response()->json($post, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' =>   'required',
            'content' => 'required|max:255'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $newPost = Post::create($request->all());
        return response()->json($newPost, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show a post
        $post = Post::find($id);
        if(is_null($post)){
            return response()->json(["message" => "Post not found"], 404);
        }
        return response()->json($post, 200);
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
        // update a post
        $post = Post::find($id);
        if(is_null($post)){
            return response()->json(["message" => "Post not found"], 404);
        }
        $post->update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // delete a post
        $post = Post::destroy($id);
        return response()->json([
            "message" => "Post Deleted!"
            ],
             204
            );
    }
}
