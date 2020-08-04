<?php

namespace App\Models;

use App\User;
use App\Traits;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use Traits\Idea_helpers;
    public $timestamps = true;

    protected $fillable = ['topic','content','likes','unlikes','subtitle','reactions','user_id','image_id','categorie_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return  $this->morphToMany(User::class,'votable')->withPivot('value');
    }

    public function favorites()
    {
       return $this->morphToMany(User::class,'favorisable');
    }
    
    public function categories()
    {
        return $this->morphToMany(Categorie::class,'categorisable');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function categorise($id)
    {
        $categorie = Categorie::find($id);

        return $this->categories()->attach($categorie);
    }

    public function image()
    {
       return $this->morphToMany(Image::class,'imageable');
    }

    public function path()
    {
        return $this->image()->where('image_id',$this->image_id)->first()->path;
    }
   
    public function comments()
    {
        return $this->morphToMany(User::class,'comment')->withPivot('comment');
    }
}
