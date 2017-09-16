<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
    protected $fillable = [
        'name','text', 'img', 'thumb',
    ];

    protected $table = 'pictures';
}
