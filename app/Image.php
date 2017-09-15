<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animal;



class Image extends Model
{
    //
    protected $fillable = [
        'name','text', 'img',
    ];

    protected $table = 'images';



}
