<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Metier;
use App\Models\Commune;
use App\Models\Officiel;
use App\Models\Idea;
use App\Traits;


class User extends Authenticatable
{
    use Notifiable;
    use Traits\Officiel_helpers;
    use Traits\Commune_helpers;
    use Traits\Metier_helpers;
    use Traits\Idea_helpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','tel','metier_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function metiers()
    {
      return $this->hasMany(Metier::class);
    }

    public function officiel()
    {
        return $this->hasOne(Officiel::class);
    }
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function voteIdeas()
    {
       return $this->morphedByMany(Idea::class,'votable')->withPivot('value');
    }

    public function favoriteIdeas()
    {
       return $this->morphedByMany(Idea::class,'favorisable');
    }
    
}
