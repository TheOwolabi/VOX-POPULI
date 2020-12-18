<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Commentable extends Model
{
    
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->morphToMany(User::class, 'votable')->withPivot('value');
    }

    public function UpVotes()
    {
        return $this->votes()->wherePivot('value', 1);
    }


    public function downVotes()
    {
        return $this->votes()->wherePivot('value', -1);
    }

    public function Votebuttons_state()
    {
        $pointer = $this->votes();

        if (auth()->user()) {

            if ($this->votes()->where('user_id', auth()->user()->id)->exists()) {
                if ($pointer->where('user_id', auth()->user()->id)->first()->pivot->value == -1) {
                    return 'down';
                } elseif ($pointer->where('user_id', auth()->user()->id)->first()->pivot->value == 1) {
                    return 'up';
                }
            }
        }
    }
}
