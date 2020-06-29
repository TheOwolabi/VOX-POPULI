<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Metier;
use App\Models\Commune;
use App\Models\Officiel;


class User extends Authenticatable
{
    use Notifiable;

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

    public function commune(Type $var = null)
    {
        return $this->belongsTo(Commune::class);
    }

    public function metiers()
    {
      return $this->hasMany(Metier::class);
    }

    public function officiel(Type $var = null)
    {
        return $this->hasOne(Officiel::class);
    }

    public function setMetierId(Metier $metier)
    {
        $this->metier_id = $metier->id;
        $this->save();
    }
    
    public function setCommuneId(Commune $commune)
    {
        $this->commune_id = $commune->id;
        $this->save();
    }


    public function state($t)
    {
        $officiels = Officiel::all();

        foreach ($officiels as $officiel)
        {
            if(($this->id == $officiel->user_id) & ($officiel->traker != $t ))
            {
                return "disabled";
            }
        }

           
        return "";
    }

    public function style($id,$t)
    {
        $officiels = Officiel::all();

        foreach ($officiels as $officiel)
        {
            if($officiel->traker == $t )
            {
                return "badge-warning";
            }

            if(($this->id == $officiel->user_id) & ($officiel->traker != $t ))
            {
                return "badge-secondary";
            }
        }
        
       
        return "border border-warning";
    }
}
