<?php

namespace App\Models;

use App\User;
use App\Traits;
use App\Models\Image;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use Traits\Global_helpers;
    protected $fillable = ['image_id', 'title', 'description', 'user_id', 'categorie_id'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categorie()
    {
       return $this->belongsTo(Categorie::class);
    }
    
    public function image()
    {
       return $this->morphToMany(Image::class,'imageable');
    }

    public function path()
    {
        return $this->image()->where('image_id',$this->image_id)->first()->path;
    }

    public function favorites()
    {
       return $this->morphToMany(User::class,'favorisable');
    }

    public function votes()
    {
        return  $this->morphToMany(User::class,'votable')->withPivot('value');
    }

    public function downVotes()
    {
        return  $this->votes()->wherePivot('value',-1);
    }
    
    public function upVotes()
    {
        return  $this->votes()->wherePivot('value',1);
    }

    public function counter($param, $value)
    {
        return $this->_counter($this->votes, $param, $value);
    }

    public function Votebuttons_state()
    {
        return $this->_vbs($this->votes());
    }

    public function isFavorited()
    {
        if(auth()->user())
        {
            if($this->favorites()->where('user_id',auth()->user()->id)->exists())
            {
                return "favorited";
            }
            else
            {
                return "";
            }
        }
    }
}
