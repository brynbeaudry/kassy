<?php

namespace App\Http\Controllers;

use App\Picture;
use App\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class PictureController extends Controller
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
        //dd($request->all());
        if(isset($request->image)){
          $i = $request->image;
          $ajax = 1;
        }else{
          $i = $request->all();
          $ajax = 0;
        }
        DB::beginTransaction();
        try {
          $img_helper = new ImageHelper;
          //0 is the fullsize, 1 is the thumb
          $i['thumb'] = '';
          $img_helper->process_image($i);
          //dd($i);
        } catch (Exception $e) {
          DB::rollBack();
          //dd($e , $i);
        }
        try {
          //dd($i);
          $image = Picture::create($i);
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
          return  redirect()->action('AdminController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $image)
    {
        //
    }


    public function fullUrl($id)
    {
        dd('hello');
    }


    public function thumbUrl($id)
    {
        dd('hello');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $image)
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
    public function update(Request $request, Picture $image)
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
        Picture::destroy($id);
        return redirect()->route('admin');

    }
}
