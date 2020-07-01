<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Metier;
use App\Models\Commune;
use App\Models\Officiel;
use App\Traits\Officiel_helpers;
use App\Traits\Commune_helpers;
use App\Traits\Metier_helpers;


class User extends Authenticatable
{
    use Notifiable;
    use Officiel_helpers;
    use Commune_helpers;
    use Metier_helpers;

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

}
