<?php

namespace App\Models;

use App\Models\Idea;
use App\Models\Actualite;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=['path','user_id','imageable_id','imageable_type'];
    public $timestamps = true;

    public function idea()
    {
       return $this->belongsTo(Idea::class);
    }

    public function actualites()
    {
       return $this->belongsTo(Actualite::class);
    }

    public function attributeToI()
    {
       return $this->morphedByMany(Idea::class,'imageable');
    }   

    public function attributeToIdea(Idea $idea)
    {
       return $this->attributeToI()->attach($idea);
    }

    public function attributeToA()
    {
       return $this->morphedByMany(Actualite::class,'imageable');
    }

    public function attributeToActualite(Actualite $actualite)
    {
       return $this->attributeToA()->attach($actualite);
    }

}
