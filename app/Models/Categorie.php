<?php

namespace App\Models;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['name','description'];

    public $timestamps = true;

    public function ideas()
    {
        return $this->morphedByMany(Idea::class,'categorisable');
    }

}
