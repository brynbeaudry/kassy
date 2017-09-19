<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Picture;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Storage::disk('local')->exists('etsy/etsy.json'))
          $etsyJson = Storage::disk('local')->get('etsy/etsy.json');
        else
          $etsyJson = collect();
        //dd($etsyJson);
        $etsyJson = rtrim(preg_replace("/\\n/", ' ', $etsyJson));
        $etsyItems = collect(json_decode($etsyJson, true));
        //dd($etsyJson, $etsyItems);
        $pictures = Picture::all();
        return view('welcome', ['pictures'=>$pictures, 'etsyItems' => $etsyItems]);
    }
}
