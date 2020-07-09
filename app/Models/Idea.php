<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Traits;
class Idea extends Model
{
    use Traits\Idea_helpers;
    public $timestamps = true;

    protected $fillable = ['topic','content','likes','unlikes','subtitle','reactions','user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return  $this->morphToMany(User::class,'votable')->withPivot('value');
    }
   
}
