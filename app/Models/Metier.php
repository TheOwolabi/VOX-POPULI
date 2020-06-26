<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Metier extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id',
    ];
    public $timestamps = true;

  

}
