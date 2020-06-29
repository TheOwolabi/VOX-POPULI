<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Commune extends Model
{
  protected $fillable = ['name','population'];
  public $timetamps = true;

  public function users()
  {
    return  $this->hasMany(User::class);
  }

  public function officiels()
  {
    return  $this->hasMany(Officiel::class);
  }

}
