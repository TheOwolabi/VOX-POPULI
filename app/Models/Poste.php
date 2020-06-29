<?php

namespace App\Models;
use App\Models\Officiel;


use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = ['intitule','fiche','mandat'];
    public $timetamps = true;

    public function officiel()
    {
      return  $this->hasOne(Officiel::class);
    }
    
}
