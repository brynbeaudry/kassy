<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
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

        if(isset($request->image)){
          $i = $request->image;
          $ajax = 1;
        }else{
          $i = $request->all();
          $ajax = 0;
        }

        //dd($image);

        DB::beginTransaction();
        try {
          $image = Image::create($i);
        } catch (\Illuminate\Database\QueryException $e) {
          DB::rollback();
          return response()->json(array("success" => 0), 200);
        }
        if(!$image){
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
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Image::destroy($id);
        return redirect()->route('admin');

    }
}
