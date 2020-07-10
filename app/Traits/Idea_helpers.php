<?php

namespace App\Traits;
use App\Traits\Global_helpers;
use App\Models\Idea;


trait Idea_helpers
{
    use Global_helpers;

    public function downVotes()
    {
        return  $this->votes()->wherePivot('value',-1);
    }
    
    public function upVotes()
    {
        return  $this->votes()->wherePivot('value',1);
    }

    public function VoteI(Idea $idea, $vote)
    {
        return $this->_vote($this->voteIdeas(), $idea, $vote);
    }

    public function counter($param, $value)
    {
        return $this->_counter($this->votes, $param, $value);
    }


    public function Votebuttons_state()
    {
        $pointer = $this->votes();

        if(auth()->user())
        {
          
            if($pointer->where('user_id',auth()->user()->id)->exists())
            {
                if($pointer->where('user_id',auth()->user()->id)->first()->pivot->value == -1)
                {
                    return 'down';
                }
                elseif($pointer->where('user_id',auth()->user()->id)->first()->pivot->value == 1)
                {
                    return 'up';
                }
            }
           
        }
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
