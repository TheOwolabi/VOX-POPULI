<?php

namespace App\Models;

use App\User;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use App\Traits;

class Actualite extends Model
{
    use Traits\Global_helpers;
    protected $fillable = ['image_id', 'title', 'description', 'user_id', 'categorie_id'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
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

    public function VoteA(Actualite $actualite, $vote)
    {
        return $this->_vote($this->voteActualites(), $actualite, $vote);
    }

    public function counter($param, $value)
    {
        return $this->_counter($this->votes, $param, $value);
    }

    public function Votebuttons_state()
    {
        return $this->_vbs($this->votes());
    }
}
