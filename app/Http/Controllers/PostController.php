<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //

        if(isset($request->post)){
          $post = $request->post;
          $ajax = 1;
        }else{
          $post = $request->all();
          $ajax = 0;
        }

        //dd($post);

        DB::beginTransaction();
        try {
          $post = Post::create($post);
        } catch (\Illuminate\Database\QueryException $e) {
          DB::rollback();
          return response()->json(array("success" => 0), 200);
        }
        if(!$post){
          DB::rollback();
          return response()->json(array("success" => 0), 200);
        }
        DB::commit();
        if($ajax)
          return response()->json(array("success" => 1, "redirect" => $redirect), 200);
        else
          return  redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
        Post::destroy($id);
        return redirect()->route('admin');
    }
}
