<?php

namespace App\Models;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=['path','user_id','idea_id'];
    public $timestamps = true;

    public function ideas()
    {
       return $this->belongsTo(Idea::class);
    }

    public function actualites()
    {
       return $this->belongsTo(Actualite::class);
    }
}
