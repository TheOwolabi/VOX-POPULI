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
}
