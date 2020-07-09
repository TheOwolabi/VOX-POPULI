<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Idea extends Model
{
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
       if($param == 'vote')
       {
            if($value == 'contre')
            {
                return $this->downVotes()->count();
            }
            elseif($value == 'pour')
            {
                return $this->upVotes()->count();
            }
       }
    }

    public function state()
    {
        if(auth()->user())
        {
            if($this->votes()->where('user_id',auth()->user()->id)->exists())
            {
                if($this->votes()->where('user_id',auth()->user()->id)->first()->pivot->value == -1)
                {
                    return 'down';
                }
                elseif($this->votes()->where('user_id',auth()->user()->id)->first()->pivot->value == 1)
                {
                    return 'up';
                }
            }
        }
        

        return "";
    }
   
}
