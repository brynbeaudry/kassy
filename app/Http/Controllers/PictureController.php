<?php

namespace App\Http\Controllers;

use App\Picture;
use App\ImageHelper;
use Intervention\Image\Facades\Image;
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
        if(isset($request->picture)){
          $pic = $request->picture;
          $ajax = 1;
        }else{
          $pic = $request->all();
          $ajax = 0;
        }
        DB::beginTransaction();
        try {
          $img_helper = new ImageHelper;
          //0 is the fullsize, 1 is the thumb
          $pic['thumb'] = '';
          $img_helper->process_image($pic);

        } catch (Exception $e) {
          DB::rollBack();
        }
        try {
          $picture = Picture::create($pic);
        } catch (\Illuminate\Database\QueryException $e) {
          //dd($e);
          DB::rollback();
          return response()->json(array("success" => 0), 200);
        }
        if(!$picture){
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
     * @param  \App\Picture  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $image)
    {
        //
    }


    public function fullUrl($id)
    {
        $p = Picture::findOrFail($id);
        return Image::make($p->img)->response('jpg');
    }


    public function thumbUrl($id)
    {
        $p = Picture::findOrFail($id);
        return Image::make($p->thumb)->response('jpg');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Picture  $image
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
     * @param  \App\Picture  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Picture::destroy($id);
        return response()->json(array("success" => 1, "redirect" => '/admin'), 200);
    }
}
