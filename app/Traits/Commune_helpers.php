<?php

namespace App\Traits;
use App\Models\Commune;

trait Commune_helpers
{
    public function setCommuneId(Commune $commune)
    {
        $this->commune_id = $commune->id;
        $this->save();
    }

}
