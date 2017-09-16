<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('welcome', ['images'=>$images]);
    }
}
