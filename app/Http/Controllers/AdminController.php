<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageHelper;
use App\Picture;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function refreshEtsy(){
      $process = new Process('bash ./scripts/scrapeKassyEtsy');
      $process->run(function ($type, $buffer) {
          if (Process::ERR === $type) {
              echo 'ERR > '.$buffer;
          } else {
              echo 'OUT > '.$buffer;
          }
      });
      $process->wait();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::all();
        return view('admin', ['pictures'=>$pictures]);
    }
}
