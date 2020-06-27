<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Commune extends Model
{
    protected $fillable = ['name','population'];
    public $timetamps = true;

    public function users(Type $var = null)
    {
      return  $this->hasMany(User::class);
    }

}
