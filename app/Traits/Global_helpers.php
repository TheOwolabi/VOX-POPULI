<?php
namespace App\Traits;

trait Global_helpers
{

    public function _counter($pointer, $param, $value)
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

    public function _vote($pointer, $model, $vote)
    {
        if($pointer->where('votable_id',$model->id)->exists())
        {
            $pointer->updateExistingPivot($model,['value'=>$vote]);
        }
        else
        {
            $pointer->attach($model,['value'=>$vote]);
        }
    }

}