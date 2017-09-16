<?php

namespace App\Http\Controllers;

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
        $pictures = Picture::all();
        return view('welcome', ['pictures'=>$pictures]);
    }
}
