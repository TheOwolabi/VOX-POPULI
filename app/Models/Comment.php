<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = ['comment','idea_id'];
    public $timestamps = true;

    public function idea()
    {
       return $this->belongsTo(Idea::class);
    }

}
