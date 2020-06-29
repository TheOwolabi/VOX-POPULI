<?php

namespace App\Models;
use App\Models\Poste;
use App\User;


use Illuminate\Database\Eloquent\Model;

class Officiel extends Model
{
    protected $fillable = ['user_id','commune_id', 'poste_id','traker'];
    public $timetamps = true;

    public function poste()
    {
      return  $this->belongsTo(Poste::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }


}
