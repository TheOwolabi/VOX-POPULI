<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Metier extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id',
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  

}
